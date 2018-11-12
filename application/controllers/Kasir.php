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
		$this->load->view('kasir/header');
		$this->load->view('kasir/dashboard');
		$this->load->view('kasir/footer');
	}

	public function caribarang($id_transaksi){
               if(isset($_SESSION['login'])){

                $search_data = $this->input->post('search_data');

                $result = $this->Kasir_model->get_autocomplete($search_data);


                if (!empty($result))
                {
                    foreach ($result as $row):
                    	echo '
                  <tbody><tr>
                  <td>' .$row->barcode.'</td>
                  <td>' .$row->nama_barang.'</td>
                  <td>' .$row->harga_jual.'</td>
                   <td>
                   	 <form method="POST" action="'.base_url("/kasir/input_barang").'/'.$id_transaksi.'">
                    <input type="hidden" name="id_barang" class="col-lg-1 form-control" value="'.$row->id_barang.'" onfocus="startCalc();" onblur="stopCalc();"><input type="hidden" id="beras" name="harga_beli" class="col-lg-1 form-control" value="'.$row->harga_beli.'" onfocus="startCalc();" onblur="stopCalc();"><input type="hidden" id="beras" name="harga_jual" class="col-lg-1 form-control" value="'.$row->harga_jual.'" onfocus="startCalc();" onblur="stopCalc();"><div class="col-md-3 col-sm-6 col-xs-6"><input type="text" name="jumlah" class="form-control" value="1" onfocus="startCalc();" onblur="stopCalc();"></div>   <button type="submit" id="myenter" onclick="myFunction()" class="btn btn-success">Masukan Barang
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
	 	$this->load->view('landing/login');
 		}

    }

    public function input_barang($id_transaksi){
	 	if(isset($_SESSION['login'])){
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

		}
		
	}

	public function input_transaksi($id_transaksi,$total){
 		if(isset($_SESSION['login'])){
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
	 		$this->load->view('landing/index');
 		}
	}

}
