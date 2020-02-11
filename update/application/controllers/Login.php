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

		$this->db->select('id_pegawai,nama,NIP,level')
				 ->where('username',$username)
				 ->where('password',$password)
				 ->where('status','aktif');
		$query=$this->db->get('dosen')->result_array();
		
		//echo $query;
		if(count($query)>0){
				 
			$this->mysessioncheck->createSession($query[0]);

			print_r($query[0]);
			
			redirect(base_url()."index.php/dashboard/".$this->session->userdata('level'));
		}else{
			//echo "gagal login";
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