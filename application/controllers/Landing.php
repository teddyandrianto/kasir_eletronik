<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {
	public function __construct()
 	{
 		date_default_timezone_set('Asia/Jakarta');
 		parent::__construct();
 		$this->load->model('Login_model');
 		$this->load->database();
 		$this->load->helper('url');
  	}

	public function index()
	{
		$this->load->view('login_page');
	}

	public function login()
 	{
 		if($this->Login_model->verivikasi_login()){
        if($_SESSION['login']['status']==1){
          redirect('admin/index');
        }elseif($_SESSION['login']['status']==2){
         	redirect('manager/index');
        }elseif($_SESSION['login']['status']==3){
          redirect('kasir/index');
        }
      }else{
                  $this->session->set_flashdata("pesan", "<div class=\"col-lg-4 col-lg-offset-4\"><div class=\"alert alert-danger\">
    <a  class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
        <strong>Oops!</strong><br> Username/password yang Anda Masukan Salah<br><b>Atau Akun Belum Terdaftar !</b>
      </div></div>");
            redirect(base_url());
        }
 	}

 	public function logout()
 	{
 		session_destroy();
 		redirect('landing');	
 	}
}
