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
		$query = $this->model_level_akses->addListLevelAkses($data);

		if($query){
			$response = array(
					'message' => 'Data berhasil disimpan !',
					'type' => 'success'
				    );
		}else{
			$response = array(
					'message' => 'Data gagal disimpan !',
					'type' => 'danger'
				    );
		}

		
		echo json_encode($response);
	}

	function rmvListLevelAkses(){
		$this->load->model('model_level_akses');
		$data = $this->input->post('id_level_akses');
		//echo $data; break;
		$query = $this->model_level_akses->rmvListLevelAkses($data);
		if($query){
			$response = array(
					'message' => 'Data berhasil dihapus !',
					'type' => 'success'
				    );
		}else{
			$response = array(
					'message' => 'Data gagal dihapus !',
					'type' => 'danger'
				    );
		}
		echo json_encode($response);
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
		$idFolder = "";
		
		if($aksiFolder=="Tambah"){
			$id = $idFolder;
			$val = array(
					'id_folder' => $id,
					'parent' => "#",
					'position' =>"0",
					'nama' =>$namaFolder
				);
			$query = $this->Model_dokumen->addFolderRoot($val);	

			if($query){
				$message = 'Data berhasil disimpan !';
				$type = 'success';
			}else{
				$message = 'Data gagal disimpan !';
				$type = 'danger';
			}
			
			$response = array(
						'message' => $message,
						'type' => $type
					    );
			echo json_encode($response);
		}else{
			$val = array(
					'nama' =>$namaFolder
				);
			$query = $this->Model_dokumen->editFolderRoot($val,$idFolder);
			if($query){
				$message = 'Data berhasil diubah !';
				$type = 'success';
			}else{
				$message = 'Data gagal diubah !';
				$type = 'danger';
			}
			$response = array(
						'message' => $message,
						'type' => $type
					    );
			echo json_encode($response);
		}
	}

	function delFolder(){
		$id_folder = $this->input->post('id');
		$this->load->model('Model_dokumen');
		$query = $this->Model_dokumen->deleteFolderRoot($id_folder);
		if($query){
			$message = 'Data berhasil dihapus !';
			$type = 'success';
		}else{
			$message = 'Data gagal dihapus !';
			$type = 'danger';
		}
		$response = array(
					'message' => $message,
					'type' => $type
				    );
		echo json_encode($response);
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
		$this->load->view('base/nav-sidebar_admin');
		$this->load->view($page,$output);		
		$this->load->view('base/footer');
		$this->load->view('base/control-sidebar');			
		$this->load->view('base/wrapper-close');
	}
}

?>