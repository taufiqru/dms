<?php
defined('BASEPATH') or exit('no direct script allowed');
class Rps extends CI_Controller{
	function index(){

		$this->load->library('grocery_CRUD');
		$crud=new grocery_CRUD();
		//$crud->unset_jquery();

		$crud->set_table('file');		
		//$crud->unset_operations();
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->set_relation('folder','folder','text');
		$crud->where('folder','1');
		$crud->columns('file','download');
		$crud->callback_column('download',array($this,'download_button'));
		$output=$crud->render();
		
		$data['view']='layout/front';
		$data['param']=$output;
		$data['title']="Data Rancangan Pembelajaran Semester";
		$this->load->view('dashboard',$data);
	
	}

	function download_button($value, $row){
		return "<a href='".base_url()."uploads/".$row->file."' class='btn btn-primary'>Download</a>";
	}
}
?>