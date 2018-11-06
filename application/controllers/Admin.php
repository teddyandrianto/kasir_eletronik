<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
 	{
 		date_default_timezone_set('Asia/Jakarta');
 		parent::__construct();
 		$this->load->model('Admin_model');
 		$this->load->database();
 		$this->load->helper('url');
  	}

	public function index()
	{
		if($_SESSION['login']['status']=='1'){
			$barang = $this->Admin_model->getbarang();
			$this->load->view('admin/header');
			$this->load->view('admin/dashboard',['barang'=>$barang]);
			$this->load->view('admin/footer');
		}else{
			redirect('landing');
		}
	}

	public function input_barang(){
		$barcode  = $_POST['barcode'];
		$nama_barang = $_POST['nama_barang'];
		$harga_jual = $_POST['harga_jual'];
		$harga_beli = $_POST['harga_beli'];
		$stok = $_POST['stok'];
		$inputdata = array(
          'barcode' => $barcode,
          'nama_barang' => $nama_barang,
          'harga_jual' =>$harga_jual,
          'harga_beli' =>$harga_beli,
          'stok' => $stok
      );
      $res = $this->Admin_model->input('tbl_barang',$inputdata);
          if($res>=1){
               $this->session->set_flashdata("pesan", '<script>
              alert("Input Barang dengan'.$nama_barang.' Berhasil");
              </script>');
              redirect('admin');
          }else{
           $this->session->set_flashdata("pesan", '<script>
              alert("Maaf Input Barang Gagal");
              </script>');
              redirect('admin');
          }
	}

	public function ubah_barang($id_barang){
		$barcode  = $_POST['barcode'];
		$nama_barang = $_POST['nama_barang'];
		$harga_jual = $_POST['harga_jual'];
		$harga_beli = $_POST['harga_beli'];
		$stok = $_POST['stok'];
		$ubahdata = array(
          'barcode' => $barcode,
          'nama_barang' => $nama_barang,
          'harga_jual' =>$harga_jual,
          'harga_beli' =>$harga_beli,
          'stok' => $stok
      );
	  $where = array('id_barang'=>$id_barang);
      $res = $this->Admin_model->update('tbl_barang',$ubahdata,$where);
          if($res>=1){
               $this->session->set_flashdata("pesan", '<script>
              alert("Ubah Barang dengan'.$nama_barang.' Berhasil");
              </script>');
              redirect('admin');
          }else{
           $this->session->set_flashdata("pesan", '<script>
              alert("Maaf Ubah Barang Gagal");
              </script>');
              redirect('admin');
          } 
	}

	public function hapus_barang($id_barang){
		$where = array('id_barang'=>$id_barang);
      	$res = $this->Admin_model->delete('tbl_barang',$where);
          if($res>=1){
               $this->session->set_flashdata("pesan", '<script>
              alert("Hapus Barang Berhasil");
              </script>');
              redirect('admin');
          }else{
           $this->session->set_flashdata("pesan", '<script>
              alert("Maaf Hapus Barang Gagal");
              </script>');
              redirect('admin');
          } 
	}
}