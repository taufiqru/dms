<?php
defined('BASEPATH') OR exit('no direct script allowed');

class Akun extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->mysessioncheck->checkSession('no_pegawai','login');
	}

	function index(){
		$this->load->library('grocery_CRUD');
 		$crud=new grocery_CRUD();
		$crud->unset_jquery();
		$crud->unset_bootstrap();
		$crud->set_table('akun');
		$crud->field_type('password','password');
		$crud->required_fields('no_pegawai','nama','username','password','status','level','level_akses_folder');
		$crud->callback_read_field('password',function($value,$primary_key){ return '****';});
		$crud->callback_edit_field('password',array($this,'set_password_empty'));
		$crud->callback_edit_field('email',array($this,'emailForm'));
		$crud->callback_add_field('email',function(){
			return "<input type='email' name='email' class='form-control' required>";
		});
		
		$crud->set_relation('level_akses_folder','level_akses','level');
		$crud->callback_before_insert(array($this,'encrypt_password_callback'));
		$crud->callback_before_update(array($this,'encrypt_password_callback'));
		$output=$crud->render();
		$output->title_1="Akun";
		$output->title_2="Pengaturan Akun Pengguna";
		$output->back_button=base_url()."akun";
		$this->show($output);
	}

	function emailForm($value,$row){
		return "<input type='email' name='email' class='form-control' value='".$value."' required>";
	}

	function set_password_empty(){
		return "<input type='password' name='password' value='' class='form-control'/>";
	}

	function encrypt_password_callback($post_array){
		$this->load->library('encryption');
		$post_array['password'] = $this->encryption->encrypt($post_array['password']);
		return $post_array;

	}

	function show($output=null){
		$this->load->view('base/header');		
		$this->load->view('base/wrapper-open');
		$this->load->view('base/nav-header');
		$level=$this->session->userdata('level');
		$this->load->view('base/nav-sidebar_admin');
		$this->load->view('layout/table',$output);		
		$this->load->view('base/footer');
		$this->load->view('base/control-sidebar');	
		$this->load->view('base/wrapper-close');
	}
	
}