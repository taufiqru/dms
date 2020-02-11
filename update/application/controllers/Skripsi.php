<?php
/*  
controller untuk manage data skripsi untuk sementara
*/
defined('BASEPATH') OR exit('no direct script allowed');

class Skripsi extends CI_Controller{
	function index(){
		$this->load->library('grocery_CRUD');
		$crud=new grocery_CRUD();
		//$crud->unset_jquery();

		$crud->set_table('skripsi');
		$crud->set_field_upload('dokumen');
		$crud->unset_texteditor('judul','full_text');
		$crud->unset_back_to_list();
		$output=$crud->render();
		
		$this->load->view('layout/crud',$output);
	}

	function user(){
		$this->load->library('grocery_CRUD');
		$crud=new grocery_CRUD();
		$crud->unset_jquery();

		$crud->set_table('skripsi');		
		$crud->unset_edit();
		$crud->set_field_upload('dokumen','assets/uploads/skripsi');
		$crud->unset_delete();
		$crud->required_fields('nim','nama','tahun','judul','dokumen');
		$output=$crud->render();
		
		$data['view']='layout/front';
		$data['param']=$output;
		$data['title']="Data Skripsi Mahasiswa";
		$this->load->view('dashboard',$data);
	}
}

?>