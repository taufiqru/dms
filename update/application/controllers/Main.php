<?php
defined('BASEPATH') OR exit('No Direct Script Allowed');

class Main extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->mysessioncheck->checkSession('id_pegawai','login');
	}

	public function index(){
		$this->load->view('base/header');		
		$this->load->view('base/wrapper-open');
		$this->load->view('base/nav-header');
		$this->load->view('base/nav-sidebar');
		$this->load->view('main');
		$this->load->view('base/footer');
		$this->load->view('base/control-sidebar');	
		$this->load->view('base/wrapper-close');	
	}
}