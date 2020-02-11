<?php
/*  
controller untuk manage data skripsi untuk sementara
*/
defined('BASEPATH') OR exit('no direct script allowed');

class Penelitian extends CI_Controller{
	function index(){
		$this->load->library('grocery_CRUD');
		$crud=new grocery_CRUD();
		//$crud->unset_jquery();

		$crud->set_table('penelitian');
		$crud->set_field_upload('dokumen');
		$crud->unset_texteditor('judul','full_text');
		//$crud->set_relation('nama','dosen','nama');
		$crud->callback_field('nama',array($this,'opsinama'));
		$crud->unset_back_to_list();
		$output=$crud->render();
		
		$this->load->view('layout/crud',$output);
	}

	function opsinama($value='',$primary_key=null){
		$this->db->select('nama');
		$this->db->where('NIP != ','0');
		$query=$this->db->get('dosen')->result();
		$opsi="";
		foreach($query as $row){
			$opsi=$opsi."<option value='".$row->nama."'>".$row->nama."</option>";
		}
		return "<select name='nama' class='chosen-single chosen-default'>".$opsi."</select>";
	}

	function user(){
		$this->load->library('grocery_CRUD');
		$crud=new grocery_CRUD();
		//$crud->unset_jquery();

		$crud->set_table('penelitian');		
		//$crud->unset_operations();
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$output=$crud->render();
		
		$data['view']='layout/front';
		$data['param']=$output;
		$data['title']="Data Penelitian, Pengabdian dan Publikasi Dosen";
		$this->load->view('dashboard',$data);
	}
}

?>