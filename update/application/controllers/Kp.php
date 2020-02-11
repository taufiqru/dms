<?php
/*  
controller untuk manage data skripsi untuk sementara
*/
defined('BASEPATH') OR exit('no direct script allowed');

class Kp extends CI_Controller{
	function index(){
		$this->load->library('grocery_CRUD');
		$crud=new grocery_CRUD();
		//$crud->unset_jquery();

		$crud->set_table('kerja_praktek');
		$crud->set_field_upload('dokumen');
		$crud->unset_texteditor('judul','full_text');
		$crud->unset_back_to_list();
		$output=$crud->render();
		
		$this->load->view('layout/crud',$output);
	}

	function user(){
		$this->load->library('grocery_CRUD');
		$crud=new grocery_CRUD();
		//$crud->unset_jquery();

		$crud->set_table('kerja_praktek');	
		$crud->set_subject('Kerja Praktik');
		$crud->set_field_upload('dokumen','assets/uploads/kp');
		$crud->required_fields('nim','nama','tahun','judul','dokumen','tempat');
		$crud->unset_edit();
		$crud->unset_delete();
		$output=$crud->render();
		
		$data['view']='layout/front';
		$data['param']=$output;
		$data['title']="Data Kerja Praktik Mahasiswa";
		$this->load->view('dashboard',$data);
	}
}

?>