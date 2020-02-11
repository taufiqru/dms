<?php 
defined('BASEPATH') or exit('no direct script allowed');

class User extends CI_Controller{
	function index(){
		$data['view']='layout/user';
		$data['param']="";
		$this->load->view('dashboard',$data);
	}


}
?>