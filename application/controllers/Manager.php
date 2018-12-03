<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {
	public function __construct()
 	{
 		date_default_timezone_set('Asia/Jakarta');
 		parent::__construct();
 		$this->load->model('Manager_model');
 		$this->load->database();
 		$this->load->helper('url');
  	}
	public function index()
	{
		if($_SESSION['login']['status']=='2'){
			$count_karyawan = $this->db->query('SELECT count(id_user) as hasil FROM tbl_user')->row();
			$count_barang_kosong = $this->db->query('SELECT count(id_barang) as hasil FROM tbl_barang WHERE stok<=0')->row();
			$perolehan = $this->db->query('SELECT sum((harga_jual-harga_beli)*jumlah) as hasil FROM tbl_detail_transaksi JOIN tbl_transaksi ON tbl_transaksi.id_transaksi=tbl_detail_transaksi.id_transaksi WHERE tbl_transaksi.status=1')->row();
			$this->load->view('manager/header');
			$this->load->view('manager/dashboard',['count_karyawan'=>$count_karyawan,'count_barang_kosong'=>$count_barang_kosong,'perolehan'=>$perolehan]);
			$this->load->view('manager/footer');
		}else{
			redirect('landing');
		}
	}

	public function Pegawai()
	{
		if($_SESSION['login']['status']=='2'){
			$pegawai = $this->Manager_model->getpegawai();
			$this->load->view('manager/header');
			$this->load->view('manager/data_pegawai',['pegawai'=>$pegawai]);
			$this->load->view('manager/footer');
		}else{
			redirect('landing');
		}
	}

	public function Laporan_Barang()
	{
		if($_SESSION['login']['status']=='2'){
			$barang = $this->Manager_model->getbarang();
			$this->load->view('manager/header');
			$this->load->view('manager/data_barang',['barang'=>$barang]);
			$this->load->view('manager/footer');
		}else{
			redirect('landing');	
		}
	}

	public function Laporan_transaksi()
	{
		if($_SESSION['login']['status']=='2'){
			$transaksi = $this->Manager_model->getlaporantrx();
			$this->load->view('manager/header');
			$this->load->view('manager/data_transaksi',['transaksi'=>$transaksi]);
			$this->load->view('manager/footer');
		}else{
			redirect('landing');	
		}
	}

	public function Laporan_transaksi_detail($id_transaksi)
	{
		if($_SESSION['login']['status']=='2'){
			$transaksi_detail = $this->Manager_model->getlaporantrxdetail($id_transaksi);
			$trx = $this->Manager_model->getdetailtrx($id_transaksi);
			$this->load->view('manager/header');
			$this->load->view('manager/data_transaksi_detail',['transaksi_detail'=>$transaksi_detail,'trx'=>$trx]);
			$this->load->view('manager/footer');
		}else{
			redirect('landing');	
		}
	}

	public function profile()
  {
    if($_SESSION['login']['status']==2){
    $this->load->view('manager/header');
    $this->load->view('manager/profile_manager');
    $this->load->view('manager/footer');
    }else{
      redirect('landing');
    }
  }

   public function update_password(){
    if($_SESSION['login']['status']==2){
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
      $res = $this->Manager_model->update('tbl_user',$updatepass,$where);
      if($res>=1){
          $_SESSION['login']['password'] = $password;
         $this->session->set_flashdata("pesan", '<script>
          alert("Ubah Password Berhasil");
            </script>');
          redirect('manager/profile/');
      }else{
          $this->session->set_flashdata("pesan", '<script>
          alert("Ubah Password Gagal");
            </script>');
          redirect('manager/profile/');
      }
      }else{
      	$this->session->set_flashdata("pesan", '<script>
          alert("Konfirmasi Password tidak valid !");
            </script>');

          redirect('manager/profile/');
      }
          }else{
          	$this->session->set_flashdata("pesan", '<script>
          alert("Password baru Tidak boleh sama dengan password Lama !");
            </script>');
          redirect('manager/profile/');
  }
  }else{
  	 $this->session->set_flashdata("pesan", '<script>
          alert("Password Lama Yang Dimasukan Salah");
            </script>');
          redirect('manager/profile/');
  }
    }else{
      redirect('landing');
    }
  } 

}
