<?php
class Loadview extends CI_Controller {

	//front
	public function index(){
		$this->load->view('admin/login');
	}

	//Dashboard
	public function dashboardadmin(){
		if ($this->checkcookieadmin()) {
			$this->load->view('admin/dashboard');
		}else{
			header("Location: ".base_url()."index.php/loginadmin");
			die();
		}
	}

	//Dashboard
	public function kategoriadmin(){
		if ($this->checkcookieadmin()) {
			$this->load->view('admin/kategori');
		}else{
			header("Location: ".base_url()."index.php/loginadmin");
			die();
		}
	}

	

}