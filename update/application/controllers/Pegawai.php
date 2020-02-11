<?php
defined('BASEPATH') OR exit('no direct script allowed');

class Pegawai extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->mysessioncheck->checkSession('id_pegawai','login');
	}

	function index(){
		$this->load->library('grocery_CRUD');
		$crud=new grocery_CRUD();
		$crud->unset_jquery();
		//$crud->unset_bootstrap();
		$crud->unset_texteditor('alamat_rumah','full_text');
		$crud->unset_texteditor('alamat_kantor','full_text');
		$crud->set_field_upload('foto');
		$crud->set_table('dosen');
		$crud->field_type('password','password');
		$crud->callback_field('email',array($this,'emailForm'));
		$crud->columns(array('NIP','nama','foto'));
		$crud->callback_column('foto',array($this,'callback_foto'));
		if($this->session->userdata('level')=='Pegawai'){
			$crud->unset_back_to_list();
		}		
		$output=$crud->render();
		$output->title_1="Profil";
		$output->title_2="Edit profil pengguna";
		$output->back_button=base_url()."index.php/pegawai";
		$this->show($output);
	}

	function emailForm($value,$row){
		return "<input type='email' name='email' class='form-control' value='".$value."' required>";
	}

	function callback_foto($value,$row){
		return "<img src='".base_url()."assets/uploads/files/".$value."' width='100'>";
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

	function export(){
		$this->db->select('FNAM,FNIP');
		$exec=$this->db->get('fasilkom_dosen')->result();
		$count=0;
		foreach ($exec as $row) {
			$res=$this->batch_insert($row->FNAM,$row->FNIP);
			echo $row->FNAM." : ".$row->FNIP. "<br>";
			if($res){$count++;}
		}
		echo $count." row has been inserted";
	}

	function export_username(){
		$this->db->select('NIP');
		$exec=$this->db->get('pegawai')->result();
		$count=0;
		foreach($exec as $row){
			$res=$this->batch_update($row->NIP);
			($res)?$count++:$count;
		}
		echo $count. " row has been updated";
	}

	function batch_insert($nama,$nip){
		$data=array(
				'nama'=>$nama,
				'NIP'=>$nip
			);
		return $this->db->insert('pegawai',$data);
	}

	function batch_update($nip){
		$data=array(
			'username'=>$nip,
			'password'=>'admin'
			);
		$this->db->where('NIP',$nip);
		return $this->db->update('pegawai',$data);
	}
}