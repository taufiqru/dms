<?php
defined('BASEPATH') OR exit('no direct script allowed');

class Aktivitas extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->mysessioncheck->checkSession('id_pegawai','login');
	}

	function index(){
		$this->load->library('grocery_CRUD');

		$crud=new grocery_CRUD();		
		$crud->unset_jquery();
		
		$crud->set_table('kegiatan');
		$crud->set_relation('id_event','event','nama');
		
		
		
		$crud->display_as('id_event','Pelatihan');
			 
		$crud->callback_field('waktu_mulai',array($this,'timepicker'));
		$crud->callback_field('waktu_selesai',array($this,'timepicker2'));
		
		$crud->unset_texteditor('deskripsi','full_text');
		$crud->columns(array('nama','waktu_mulai','id_event'));

		$output=$crud->render();

		$this->show('aktivitas',$output);
	}

	function timepicker($value=''){
		return '<div class="bootstrap-timepicker"><input type="text" class="form-control timepicker" value="'.$value.'" name="waktu_mulai"></div>';
	}

	function timepicker2($value=''){
		return '<div class="bootstrap-timepicker"><input type="text" class="form-control timepicker" value="'.$value.'" name="waktu_selesai"></div>';
	}

	function show($page,$output){
		$this->load->view('base/header');		
		$this->load->view('base/wrapper-open');
		$this->load->view('base/nav-header');
		$this->load->view('base/nav-sidebar');		
		$this->load->view($page,$output);		
		$this->load->view('base/footer');
		$this->load->view('base/control-sidebar');
		$this->load->view('base/timepicker');			
		$this->load->view('base/wrapper-close');
	}
}