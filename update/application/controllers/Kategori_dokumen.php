<?php 
defined('BASEPATH') or exit('no direct script allowed');

class Kategori_dokumen extends CI_Controller{
	function __contruct(){
		parent::__contruct();
		$this->mysessioncheck->checkSession('id_pegawai','login');	
	}

	function index(){
		$this->load->library('grocery_CRUD');
		$crud=new grocery_CRUD();
		$crud->unset_jquery();
		$crud->set_table('kategori_dokumen');
		$crud->display_as('nama_kategori','Nama Folder');
		$crud->columns(array('nama_kategori','deskripsi'));
		$crud->callback_field('level',array($this,'callback_level'));
		// $crud->field_type('level','hidden','parent');
		$output=$crud->render();
		$output->title_1="Pengaturan";
		$output->title_2="Kategori Dokumen";
		$output->back_button=base_url()."index.php/dokumen"; 
		$this->show($output);
	}

	function callback_level($value='',$primary_key=null){
		$data="";
		$this->db->select('nama_kategori');
		$this->db->where('level','parent');
		$query=$this->db->get('kategori_dokumen')->result();
		foreach($query as $row){
			$data.="<option value='".$row->nama_kategori."'>".$row->nama_kategori."</option>";
		}
		
		$combobox="<select class='form-control' data-placeholder='Select Level' name='level'>
				  <option value='parent'>Parent</option>".$data."
				  </select>";

		return $combobox;
	}

	function show($output=null){
		$this->load->view('base/header');		
		$this->load->view('base/wrapper-open');
		$this->load->view('base/nav-header');
		$level=$this->session->userdata('level');
		if($level=="Pegawai"){
			$this->load->view('base/nav-sidebar_user');	
		}else{
			$this->load->view('base/nav-sidebar_admin');
		}	
		$this->load->view('layout/table',$output);		
		$this->load->view('base/footer');
		$this->load->view('base/control-sidebar');	
		$this->load->view('base/wrapper-close');
	}
}
?>