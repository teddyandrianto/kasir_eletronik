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
		$this->load->view('manager/header');
		$this->load->view('manager/dashboard');
		$this->load->view('manager/footer');
	}

	public function Pegawai()
	{
		$pegawai = $this->Manager_model->getpegawai();
		$this->load->view('manager/header');
		$this->load->view('manager/data_pegawai',['pegawai'=>$pegawai]);
		$this->load->view('manager/footer');
	}

	public function Laporan_Barang()
	{
		$barang = $this->Manager_model->getbarang();
		$this->load->view('manager/header');
		$this->load->view('manager/data_barang',['barang'=>$barang]);
		$this->load->view('manager/footer');
	}

	public function Laporan_transaksi()
	{
		$transaksi = $this->Manager_model->getlaporantrx();
		$this->load->view('manager/header');
		$this->load->view('manager/data_transaksi',['transaksi'=>$transaksi]);
		$this->load->view('manager/footer');
	}
}
