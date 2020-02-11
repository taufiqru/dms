<?php 
defined('BASEPATH') or exit('no direct script allowed');

class Login extends CI_Controller{ 
	function __construct(){
		parent::__construct();
	}	

	function index(){
		$data="";
		if(isset($_GET['status'])){
			$data['status']="error!";
		}

		$this->show('login',$data);		
	}

	function auth(){
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		
		$this->load->model('Model_login');
		$val = $this->Model_login->doAuth($username,$password);

		if($val!=false){
			$this->mysessioncheck->createSession($val);
			redirect(base_url()."dokumen/index/".$this->session->userdata('level'));
		}else{
			 redirect(base_url()."index.php?status=error");
		}
	}

	function show($page,$output=null){
		$this->load->view($page,$output);
	}

	function logout(){
		$this->mysessioncheck->sessionDestroy('login');
	}
}