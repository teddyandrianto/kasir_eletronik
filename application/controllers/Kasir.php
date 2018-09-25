<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {
	public function index()
	{
		$this->load->view('kasir/header');
		$this->load->view('kasir/dashboard');
		$this->load->view('kasir/footer');
	}
}
