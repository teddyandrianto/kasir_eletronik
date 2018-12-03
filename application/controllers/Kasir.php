<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {
	public function __construct()
 	{
 		date_default_timezone_set('Asia/Jakarta');
 		parent::__construct();
 		$this->load->model('Kasir_model');
 		$this->load->database();
 		$this->load->helper('url');
  	}

	public function index()
	{
		if($_SESSION['login']['status']=='3'){
			$this->load->view('kasir/header');
			$this->load->view('kasir/dashboard');
			$this->load->view('kasir/footer');
		}else{
	 		redirect('landing');
 		}
	}

	public function caribarang($id_transaksi){
               if($_SESSION['login']['status']=='3'){

                $search_data = $this->input->post('search_data');

                $result = $this->Kasir_model->get_autocomplete($search_data);

                if (!empty($result))
                {
                    foreach ($result as $row):
                    	echo '
                  <tbody><tr>
                  <td>' .$row->barcode.'</td>
                  <td>' .$row->nama_barang.'</td>
                  <td>' .($row->harga_jual== 0 ? '' : number_format($row->harga_jual, 0, ',', '.')).'</td>
                   <td>
                   	 <form method="POST" action="'.base_url("/kasir/input_barang").'/'.$id_transaksi.'">
                    <input type="hidden" name="id_barang" class="col-lg-1 form-control" value="'.$row->id_barang.'" onfocus="startCalc();" onblur="stopCalc();"><input type="hidden" id="beras" name="harga_beli" class="col-lg-1 form-control" value="'.$row->harga_beli.'" onfocus="startCalc();" onblur="stopCalc();"><input type="hidden" id="beras" name="harga_jual" class="col-lg-1 form-control" value="'.$row->harga_jual.'" onfocus="startCalc();" onblur="stopCalc();"><div class="col-md-4 col-sm-6 col-xs-6"><input type="number" name="jumlah" class="form-control" value="1" max="'.$row->stok.'" min="1"></div>   <button type="submit" id="myenter" onclick="myFunction()" class="btn btn-success">Masukan Barang
                <i class="fa fa-arrow-circle-right"></i></button>
                </form>
                </td>
                </tr></tbody>';
  
    
                    endforeach;

                 
                }
                else
                {
                    echo "<li> <em> Not found ... </em> </li>";
                }
              }else{
	 	redirect('landing');
 		}

    }

    public function input_barang($id_transaksi){
	 	if($_SESSION['login']['status']=='3'){
        $id_transaksi =$id_transaksi;
		$id_barang= $_POST['id_barang'];
		$harga_beli=$_POST['harga_beli'];
		$harga_jual= $_POST['harga_jual'];
		$jumlah = $_POST['jumlah'];
		$inputdata = array(
			'id_transaksi' => $id_transaksi,
			'id_barang' => $id_barang,
			'harga_beli'=>$harga_beli,
			'harga_jual'=>$harga_jual,
			'jumlah' => $jumlah
			);
		$res = $this->Kasir_model->input('tbl_detail_transaksi',$inputdata);
		if($res>=1){
			$query = $this->db->get_where('tbl_barang',['id_barang' => $id_barang]);
        	$row = $query->row();
        	$jml =$row->stok;
        	$jml =$jml-$jumlah;
			$updatedata = array(
			'stok' => $jml
			);
		$where = array('id_barang' => $id_barang);
		$res = $this->Kasir_model->update('tbl_barang',$updatedata,$where);
		$data = $this->db->query("SELECT * FROM tbl_transaksi WHERE id_transaksi='".$id_transaksi."'")->row();
		if($data->id_transaksi!=null){
			redirect('kasir');	
		}else{
			redirect('kasir/index');
		}}else{
			redirect('kasir/index');
		}}else{
			redirect('landing');
		}
		
	}

	public function input_transaksi($id_transaksi,$total=""){
 		if($_SESSION['login']['status']=='3'){
 			$cek_barang = $this->db->query("SELECT * FROM tbl_detail_transaksi WHERE id_transaksi='".$id_transaksi."'")->row();
 			if($cek_barang!=''){
			$id_user = $_SESSION['login']['id_user'];
			$nama_pembeli = $_POST['nama_pembeli'];
			$tanggal = date("Y-m-d h:i:sa");
	        $bayar = $_POST['bayar'];
	        $kembalian = $bayar-$total;
	        $no_telpon= $_POST['no_telpon'];
			$updatedata = array(
				'nama_pembeli' => $nama_pembeli,
				'tanggal' => $tanggal,
				'bayar'=>$bayar,
				'status'=>1,
				'no_telpon'=>$no_telpon
				);
			$where = array('id_transaksi' => $id_transaksi);
			$res = $this->Kasir_model->update('tbl_transaksi',$updatedata,$where);
			if($res>=1){
				$query= $this->db->query('SELECT max(id_trx)+1 as jml FROM tbl_transaksi');
 				$row=$query->row();
 				$kodetransaksi =$row->jml;
 				$char = "TR";
				$id_transaksi = $char . sprintf("%08s",$kodetransaksi);		
				$inputdata = array(
					'id_transaksi' => $id_transaksi,
					'id_kasir' => $id_user,
					'status' => 0
					);
				$res = $this->Kasir_model->input('tbl_transaksi',$inputdata);
            	$this->session->set_flashdata("pesan", '<script> alert("Kembalian : Rp '.$kembalian.'");</script>');
                redirect('kasir');

        	}else{
       			$this->session->set_flashdata("pesan", '<script> alert("Update Bulanan Gagal");</script>');
            	redirect('kasir');
        	}
        }else{
        	redirect('kasir');
        }
		}else{
	 		redirect('landing');
 		}
	}

	public function hapus_beli($id_detail_tr){
		if($_SESSION['login']['status']=='3'){
		$data = $this->db->query("SELECT * FROM tbl_detail_transaksi WHERE id_detail_tr=".$id_detail_tr."")->row();
		$jumlah = $data->jumlah;
		$id_barang = $data->id_barang;

	 	$where = array('id_detail_tr' => $id_detail_tr);
	 	$res = $this->Kasir_model->delete('tbl_detail_transaksi',$where);
	 	if($res>=1){
	 		$data2 = $this->db->query("SELECT * FROM tbl_barang WHERE id_barang=".$id_barang."")->row();
	 		$stok = $data2->stok;
	 		$updatedata = array(
			'stok' => $stok+$jumlah
			);
	 		$where = array('id_barang'=>$id_barang);
	 		$res = $this->Kasir_model->update('tbl_barang',$updatedata,$where);
	 		if($res>=1){
	 		redirect('kasir');
	 		}else{
	 		redirect('kasir/index');	
	 		}
	 	}else{
	 		echo "gagal delete";
	 	}
	 	}else{
	 		redirect('landing');
 		}
	}

	public function batal_transaksi($id_transaksi){
		if($_SESSION['login']['status']=='3'){
			$updatedata = array(
				'status' => '0',
				
				);
			$where = array('id_transaksi'=>$id_transaksi);
			$res = $this->Kasir_model->update('tbl_transaksi',$updatedata,$where);
			if($res>=1){
	 			
					$data = $this->db->query("SELECT * FROM tbl_detail_transaksi WHERE id_transaksi='".$id_transaksi."'")->result_array();
					foreach ($data as $d) {
					$id_barang = $d['id_barang'];
					$jumlah = $d['jumlah'];
	 				$data2 = $this->db->query("SELECT * FROM tbl_barang WHERE id_barang=".$id_barang."")->row();
	 				$stok = $data2->stok;
	 				$updatedata = array(
						'stok' => $stok+$jumlah
						);
	 				$where = array('id_barang'=>$id_barang);
	 				$res = $this->Kasir_model->update('tbl_barang',$updatedata,$where);
	 				$where = array('id_transaksi' => $id_transaksi);
	 			    $res = $this->Kasir_model->delete('tbl_detail_transaksi',$where);
	 			        
	 				}

	 				redirect('Kasir/index');

	 		}else{
	 					redirect('Kasir/index');
	 				
			}
		}else{
			redirect('landing');
		}
	}

	public function histori_transaksi(){
		if($_SESSION['login']['status']==3){
			$transaksi = $this->Kasir_model->gettransaksi();
			$this->load->view('kasir/header');
			$this->load->view('kasir/data_history_trx',['transaksi'=>$transaksi]);
			$this->load->view('kasir/footer');
		}else{
			redirect('landing');
		}
	}

	public function histori_transaksi_detail($id_transaksi){
		if($_SESSION['login']['status']==3){
				$cek = $this->db->query("SELECT * FROM tbl_transaksi WHERE id_kasir='".$_SESSION['login']['id_user']."' AND id_transaksi='".$id_transaksi."'")->row();
			if($cek){
			$transaksi_detail = $this->Kasir_model->getlaporantrxdetail($id_transaksi);
				$trx = $this->Kasir_model->getdetailtrx($id_transaksi);
				$this->load->view('kasir/header');
				$this->load->view("kasir/data_histori_detail_trx",['transaksi_detail'=>$transaksi_detail,'trx'=>$trx]);
				$this->load->view('kasir/footer');
			}else{
				redirect('kasir/histori_transaksi');
			}
		}else{
			redirect('landing');
		}
	}

public function profile()
  {
    if($_SESSION['login']['status']==3){
    $this->load->view('kasir/header');
    $this->load->view('kasir/profile_kasir');
    $this->load->view('kasir/footer');
    }else{
      redirect('landing');
    }
  }

   public function update_password(){
    if($_SESSION['login']['status']==3){
      $password_lama=(md5($_POST['password_lama']));
      $password_baru=$_POST['password_baru'];
      $password_confrim=$_POST['password_confrim'];
      if($password_lama==$_SESSION['login']['password']){
      if($_POST['password_lama']!=$_POST['password_baru']){
      if($password_baru==$password_confrim ){
        $password=(md5($password_baru));
        $updatepass = array(
      'password' => $password,   
      );
      $where = array('id_user' => $_SESSION['login']['id_user']);
      $res = $this->Kasir_model->update('tbl_user',$updatepass,$where);
      if($res>=1){
          $_SESSION['login']['password'] = $password;
         $this->session->set_flashdata("pesan", '<script>
          alert("Ubah Password Berhasil");
            </script>');
          redirect('kasir/profile/');
      }else{
          $this->session->set_flashdata("pesan", '<script>
          alert("Ubah Password Gagal");
            </script>');
          redirect('kasir/profile/');
      }
      }else{
      	$this->session->set_flashdata("pesan", '<script>
          alert("Konfirmasi Password tidak valid !");
            </script>');

          redirect('kasir/profile/');
      }
          }else{
          	$this->session->set_flashdata("pesan", '<script>
          alert("Password baru Tidak boleh sama dengan password Lama !");
            </script>');
          redirect('kasir/profile/');
  }
  }else{
  	 $this->session->set_flashdata("pesan", '<script>
          alert("Password Lama Yang Dimasukan Salah");
            </script>');
          redirect('kasir/profile/');
  }
    }else{
      redirect('landing');
    }
  } 

}
