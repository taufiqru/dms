<?php defined('BASEPATH') or exit('no direct script allowed');
class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->mysessioncheck->checkSession('id_pegawai','login');
	}

	function Admin(){
		$this->show('dashboard_admin');		
	}

	function User(){
		$this->load->view('dashboard');
	}

	function Admin_old(){
		$this->load->model('model_pegawai');
		$this->load->model('model_pengumuman');
		$this->load->model('model_kegiatan');
		$this->load->model('model_dokumen');
		$query_pegawai=$this->model_pegawai->getJumlahPegawai();
		$data['jumlah_pegawai']=$query_pegawai[0]['jumlah'];
		$query_kegiatan=$this->model_kegiatan->getJumlahKegiatan();
		$data['jumlah_kegiatan']=$query_kegiatan[0]['jumlah_kegiatan'];
		$query_pengumuman=$this->model_pengumuman->getJumlahPengumuman();
		$data['jumlah_pengumuman']=$query_pengumuman[0]['jumlah_pengumuman'];
		$query_dokumen=$this->model_dokumen->getJumlahDokumen();
		$data['jumlah_dokumen']=$query_dokumen[0]['jumlah_dokumen'];
		$data['kegiatan_per_bulan']=$this->model_kegiatan->getJumlahKegiatanPerBulan();

		$this->show('dashboard_admin',$data);
	}

	function Pegawai(){
		$id_pegawai=$this->session->userdata('id_pegawai');
		$this->load->model('model_pegawai');
		$this->load->model('model_pengumuman');
		$this->load->model('model_kegiatan');
		$data['nama']=$this->session->userdata('nama');
		$data['NIP']=$this->session->userdata('NIP');
		$query_pegawai=$this->model_pegawai->getDataPegawai($id_pegawai)->result();		
		foreach($query_pegawai as $row){
			$data['tempat_lahir']=$row->tempat_lahir;
			$data['tanggal_lahir']=$row->tanggal_lahir;
			$data['email']=$row->email;
			$data['alamat']=$row->alamat_rumah;
		}
		$data['query_pengumuman']=$this->model_pengumuman->getUserPengumumanLimit($id_pegawai,'5');
		$data['query_kegiatan']=$this->model_kegiatan->getKegiatanPerBulan()->result();
		$this->show('dashboard_user',$data);
	}

	function show($page,$output=null){
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
		//$this->load->view('base/control-sidebar');	
		//$this->load->view('base/calendar2',$output);
		$this->load->view('base/wrapper-close');	
	}
}