<?php 
defined('BASEPATH') or exit('no direct script allowed');

class MySessionCheck{

	public function __construct(){
		$this->CI=& get_instance();
	}

	public function checkSession($sessionData,$page){
		if(!$this->CI->session->has_userdata($sessionData)){
			redirect(base_url().'index.php/'.$page);
		}
	}

	public function createSession($array){
		$this->CI->session->set_userdata($array);
	}

	public function sessionDestroy($page){
		$this->CI->session->sess_destroy();
		redirect(base_url().'index.php/'.$page);
	}
}