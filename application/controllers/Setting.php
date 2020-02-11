<?php
defined('BASEPATH') or exit('no direct script allowed');

class Setting extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->mysessioncheck->checkSession('no_pegawai','login');
	}

	function index(){
		$output['title_1']="Pengaturan";
		$output['title_2']="Level Akses";
		$this->show('layout/setting',$output);
	}

	function folder(){
		$output['title_1']="Pengaturan";
		$output['title_2']="Folder";
		$this->show('setting_folder',$output);
	}

	function getListLevelAkses(){
		$this->load->model('model_level_akses');
		$data = $this->model_level_akses->getListLevelAkses();
		echo json_encode($data);
	}

	function addListLevelAkses(){
		$this->load->model('model_level_akses');
		$data = array(
					'level' => $this->input->post('level'),
					'keterangan' => $this->input->post('keterangan')
				);
		$this->model_level_akses->addListLevelAkses($data);
		//echo json_encode($data);
	}

	function rmvListLevelAkses(){
		$this->load->model('model_level_akses');
		$data = $this->input->post('id_level_akses');
		//echo $data; break;
		$this->model_level_akses->rmvListLevelAkses($data);
	}

	function getFolder(){
		$this->load->model('Model_dokumen');
		$data = $this->Model_dokumen->getFolderRoot();
		echo json_encode($data);
	}

	function addFolder(){
		//add or edit folder
		$this->load->model('Model_dokumen');
		$namaFolder = $this->input->post('nama');
		$aksiFolder = $this->input->post('aksi');
		$idFolder = $this->input->post('id');
		
		if($aksiFolder=="Tambah"){
			$id = $this->Model_dokumen->getMaxIdFolder();
			$val = array(
					'id_folder' => $id,
					'parent' => "#",
					'position' =>"0",
					'nama' =>$namaFolder
				);
			$this->Model_dokumen->addFolderRoot($val);	
		}else{
			$val = array(
					'nama' =>$namaFolder
				);
			$this->Model_dokumen->editFolderRoot($val,$idFolder);
		}
	}

	function delFolder(){
		$id_folder = $this->input->post('id');
		$this->load->model('Model_dokumen');
		$this->Model_dokumen->deleteFolderRoot($id_folder);
	}

	function invokeAccess(){
		$level = $this->input->post('level');
		$folder = $this->input->post('folder');
		$this->load->model('model_level_akses');
		$this->model_level_akses->doUpsert($level,$folder);
	}

	function revokeAccess(){
		$level = $this->input->post('level');
		$folder = $this->input->post('folder');
		$this->load->model('model_level_akses');
		$this->model_level_akses->doRevoke($level,$folder);
	}

	function getAccess(){
		$level = $this->input->get('idLevel');
		$this->load->model('model_level_akses');
		$data = $this->model_level_akses->getAccess($level);
		echo json_encode($data);
	}

	function show($page,$output){
		$this->load->view('base/header');		
		$this->load->view('base/wrapper-open');
		$this->load->view('base/nav-header');
		$level=$this->session->userdata('level');
		if($level=="Pegawai"){
			$this->load->view('base/nav-sidebar_user');	
		}else{
			$this->load->view('base/nav-sidebar_admin');
		}			
		$this->load->view($page,$output);		
		$this->load->view('base/footer');
		$this->load->view('base/control-sidebar');			
		$this->load->view('base/wrapper-close');
	}
}

?>