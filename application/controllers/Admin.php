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
	  	if($_SESSION['login']['status']=='1'){
	  		$cek_barcode = $this->db->query("SELECT * FROM tbl_barang WHERE barcode='".$_POST['barcode']."'")->row();
	  		if(empty($cek_barcode->barcode)){
			$barcode  = $_POST['barcode'];
			$nama_barang = $_POST['nama_barang'];
			$harga_jual = $_POST['harga_jual'];
			$harga_beli = $_POST['harga_beli'];
			$stok = $_POST['stok'];
			if($harga_jual<=$harga_beli){
				$this->session->set_flashdata("pesan", '<script> alert("Maaf Input Barang Gagal,Harga Jual Harus >= Harga beli");</script>');
	            redirect('admin');
			}
			$inputdata = array(
	          'barcode' => $barcode,
	          'nama_barang' => $nama_barang,
	          'harga_jual' =>$harga_jual,
	          'harga_beli' =>$harga_beli,
	          'stok' => $stok
	      	);
	      	$res = $this->Admin_model->input('tbl_barang',$inputdata);
	        if($res>=1){
	            $this->session->set_flashdata("pesan", '<script> alert("Input Barang dengan'.$nama_barang.' Berhasil"); </script>');
	            redirect('admin');
	        }else{
	      	    $this->session->set_flashdata("pesan", '<script> alert("Maaf Input Barang Gagal");</script>');
	            redirect('admin');
	        }
	    }else{
	    	 $this->session->set_flashdata("pesan", '<script> alert("Maaf Input Barang Gagal,Barcode Sudah tersedia");</script>');
	            redirect('admin');
	    }
	    }else{
			redirect('landing');
		}
	}

	public function ubah_barang($id_barang,$barcode){
		if($_SESSION['login']['status']=='1'){
			$cek_barcode = $this->db->query("SELECT * FROM tbl_barang WHERE barcode='".$_POST['barcode']."'")->row();
	  		if(empty($cek_barcode->barcode) OR $barcode==$cek_barcode->barcode){
			$barcode  = $_POST['barcode'];
			$nama_barang = $_POST['nama_barang'];
			$harga_jual = $_POST['harga_jual'];
			$harga_beli = $_POST['harga_beli'];
			$stok = $_POST['stok'];
			if($harga_jual<=$harga_beli){
				$this->session->set_flashdata("pesan", '<script> alert("Maaf Ubah Barang Gagal,Harga Jual Harus >= Harga beli");</script>');
	            redirect('admin');
			}
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
	            	$this->session->set_flashdata("pesan", '<script> alert("Ubah Barang dengan'.$nama_barang.' Berhasil");</script>');
	            redirect('admin');
	        }else{
	        	$this->session->set_flashdata("pesan", '<script> alert("Maaf Ubah Barang Gagal");</script>');
	            redirect('admin');
	        }
	         }else{
	    	 $this->session->set_flashdata("pesan", '<script> alert("Maaf Ubah Barang Gagal,Barcode Sudah tersedia");</script>');
	            redirect('admin');
	    	}
	    }else{
			redirect('landing');
		} 
	}

	public function hapus_barang($id_barang){
		if($_SESSION['login']['status']=='1'){
			$where = array('id_barang'=>$id_barang);
	      	$res = $this->Admin_model->delete('tbl_barang',$where);
	        if($res>=1){
	            $this->session->set_flashdata("pesan", '<script> alert("Hapus Barang Berhasil"); </script>');
	            redirect('admin');
	        }else{
	            $this->session->set_flashdata("pesan", '<script> alert("Maaf Hapus Barang Gagal");</script>');
	            redirect('admin');
	        }

	    }else{
			redirect('landing');
		}
	}

	public function pegawai(){
		if($_SESSION['login']['status']=='1'){
			$pegawai = $this->Admin_model->getpegawai();
			$this->load->view('admin/header');
			$this->load->view('admin/data_pegawai',['pegawai'=>$pegawai]);
			$this->load->view('admin/footer');
		}else{
			redirect('landing');
		}
	}

	public function input_pegawai(){
	  	if($_SESSION['login']['status']=='1'){
	  		$cek_username = $this->db->query("SELECT * FROM tbl_user WHERE username='".$_POST['username']."'")->row();
			if(empty($cek_username->username)){
			$username  = $_POST['username'];
			$nama_user = $_POST['nama_user'];
			$telpon = $_POST['telpon'];
			$status = $_POST['status'];
			$password = md5($_POST['password']);
			$inputdata = array(
	          'username' => $username,
	          'nama_user' => $nama_user,
	          'telpon' =>$telpon,
	          'status' =>$status,
	          'password' => $password
	      	);
	      	$res = $this->Admin_model->input('tbl_user',$inputdata);
	        if($res>=1){
	        	if($status==3){
	        		$query= $this->db->query('SELECT max(id_trx)+1 as jml FROM tbl_transaksi');
	 				$row=$query->row();
	 				$kodetransaksi =$row->jml;
	 				$char = "TR";
					$id_transaksi = $char . sprintf("%08s",$kodetransaksi);
					$id_user = $this->db->query("SELECT max(id_user) as hasil FROM tbl_user")->row();		
					$inputdata = array(
						'id_transaksi' => $id_transaksi,
						'id_kasir' => $id_user->hasil,
						'status' => 0
						);
					$res = $this->Admin_model->input('tbl_transaksi',$inputdata);
	        	}
	            $this->session->set_flashdata("pesan", '<script> alert("Input Pegawai dengan'.$nama_user.' Berhasil"); </script>');
	            redirect('admin/pegawai');
	        }else{
	        	$this->session->set_flashdata("pesan", '<script> alert("Maaf Input Pegawai Gagal"); </script>');
	            redirect('admin/pegawai');
	        }
	    }else{
	    	$this->session->set_flashdata("pesan", '<script> alert("Maaf Input Pegawai Gagal, Username Sudah Tersedia"); </script>');
	        redirect('admin/pegawai');
	    }
	    }else{
			redirect('landing');
		}
	}

	public function ubah_pegawai($id_user,$username){
		if($_SESSION['login']['status']=='1'){
			$cek_username = $this->db->query("SELECT * FROM tbl_user WHERE username='".$_POST['username']."'")->row();
			if(empty($cek_username->username) or $cek_username->username==$username){
			$nama_user = $_POST['nama_user'];
			$telpon = $_POST['telpon'];
			$status = $_POST['status'];
			if($_POST['password']==null){
				$datapassword = $this->db->query("SELECT password FROM tbl_user WHERE id_user='".$id_user."'")->row();
				$password = $datapassword->password;
			}else{
				$password = md5($_POST['password']);
			}
			$ubahdata = array(
	          'username' => $username,
	          'nama_user' => $nama_user,
	          'telpon' =>$telpon,
	          'status' =>$status,
	          'password' => $password
		    );
			$where = array('id_user'=>$id_user);
		    $res = $this->Admin_model->update('tbl_user',$ubahdata,$where);
		    if($res>=1){
		        $this->session->set_flashdata("pesan", '<script>alert("Ubah Pegawai dengan'.$nama_user.' Berhasil"); </script>');
		        redirect('admin/pegawai');
		    }else{
		    	$this->session->set_flashdata("pesan", '<script>alert("Maaf Ubah Pegawai Gagal"); </script>');
		        redirect('admin/pegawai');
			}
		}else{
			$this->session->set_flashdata("pesan", '<script>alert("Maaf Ubah Pegawai Gagal, Username Sudah Tersedia"); </script>');
		        redirect('admin/pegawai');
			}
		
	    }else{
			redirect('landing');
		} 
	}

	public function hapus_pegawai($id_user){
		if($_SESSION['login']['status']=='1'){
			$where = array('id_user'=>$id_user);
	      	$res = $this->Admin_model->delete('tbl_user',$where);
          	if($res>=1){
               $this->session->set_flashdata("pesan", '<script>alert("Hapus pegawai Berhasil");</script>');
               redirect('admin/pegawai');
          	}else{
           		$this->session->set_flashdata("pesan", '<script> alert("Maaf Hapus Pegawai Gagal");</script>');
            	redirect('admin/pegawai');
          	} 
	    }else{
			redirect('landing');
		}
	}

	public function profile()
  {
    if($_SESSION['login']['status']==1){
    $this->load->view('admin/header');
    $this->load->view('admin/profile_admin');
    $this->load->view('admin/footer');
    }else{
      redirect('landing');
    }
  }

   public function update_password(){
    if($_SESSION['login']['status']==1){
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
      $res = $this->Admin_model->update('tbl_user',$updatepass,$where);
      if($res>=1){
          $_SESSION['login']['password'] = $password;
         $this->session->set_flashdata("pesan", '<script>
          alert("Ubah Password Berhasil");
            </script>');
          redirect('admin/profile/');
      }else{
          $this->session->set_flashdata("pesan", '<script>
          alert("Ubah Password Gagal");
            </script>');
          redirect('admin/profile/');
      }
      }else{
      	$this->session->set_flashdata("pesan", '<script>
          alert("Konfirmasi Password tidak valid !");
            </script>');

          redirect('admin/profile/');
      }
          }else{
          	$this->session->set_flashdata("pesan", '<script>
          alert("Password baru Tidak boleh sama dengan password Lama !");
            </script>');
          redirect('admin/profile/');
  }
  }else{
  	 $this->session->set_flashdata("pesan", '<script>
          alert("Password Lama Yang Dimasukan Salah");
            </script>');
          redirect('admin/profile/');
  }
    }else{
      redirect('landing');
    }
  } 
}