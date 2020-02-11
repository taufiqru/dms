<?php
defined('BASEPATH') OR exit('no direct script allowed');

class Akun extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->mysessioncheck->checkSession('id_pegawai','login');
	}

	function index(){
		$this->load->library('grocery_CRUD');

		$crud=new grocery_CRUD();
		$crud->unset_jquery();
				
		$crud->set_table('akun');
		$crud->display_as('id_pegawai','Nama Pegawai');
		$crud->set_relation('id_pegawai','pegawai','nama');
		$crud->columns(array('id_pegawai','email','status'));

		$output=$crud->render();

		$this->show($output);
	}

	function show($output=null){
		$this->load->view('base/header');		
		$this->load->view('base/wrapper-open');
		$this->load->view('base/nav-header');
		$this->load->view('base/nav-sidebar');		
		$this->load->view('akun',$output);		
		$this->load->view('base/footer');
		$this->load->view('base/control-sidebar');	
		$this->load->view('base/wrapper-close');
	}
}