<?php
defined('BASEPATH') OR exit('no direct script allowed');

class Absensi extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->mysessioncheck->checkSession('id_pegawai','login');
	}

	function index(){
		$this->load->library('grocery_CRUD');

		$crud=new grocery_CRUD();		
		$crud->unset_jquery();
		
		$crud->set_table('absensi');
		$crud->set_relation('id_pegawai','pegawai','nama');
		$crud->set_relation('id_event','event','nama');
		$crud->set_relation('id_kegiatan','kegiatan','nama');
		$crud->display_as('id_pegawai','Nama Pegawai')
			 ->display_as('id_event','Nama Pelatihan')
			 ->display_as('id_kegiatan','Kegiatan');
		$crud->columns(array('id_event','id_kegiatan','id_pegawai','status'));

		$output=$crud->render();

		$this->show('absensi',$output);
	}

	function show($page,$output){
		$this->load->view('base/header');		
		$this->load->view('base/wrapper-open');
		$this->load->view('base/nav-header');
		$this->load->view('base/nav-sidebar');		
		$this->load->view($page,$output);		
		$this->load->view('base/footer');
		$this->load->view('base/control-sidebar');			
		$this->load->view('base/wrapper-close');
	}
}