<?php
defined('BASEPATH') OR exit('no direct Script Allowed');

class Pengumuman extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->mysessioncheck->checkSession('id_pegawai','login');
	}

	function index(){
		$this->load->library('grocery_CRUD');		
		$crud=new grocery_CRUD();		
		$crud->unset_jquery();		
		$crud->set_field_upload('gambar');
		$crud->set_field_upload('attachment');
		$crud->set_table('pengumuman');
		$crud->set_subject('Pengumuman');
		$crud->columns(array('tanggal','judul','isi'));
		$crud->set_relation_n_n('kepada','penerima_pengumuman','dosen','id_pengumuman','id_pegawai','nama','priority');
		$crud->field_type('tanggal','invisible');
		$crud->callback_before_insert(array($this,'getTanggal'));
		$crud->callback_before_update(array($this,'getTanggal'));
		$crud->fields('judul','kepada','isi','gambar','attachment','tanggal');
		$crud->callback_after_insert(array($this,'cekdata'));
		$crud->callback_after_update(array($this,'cekdata'));
		$output=$crud->render();
		$output->title_1="Pengumuman";
		$output->title_2="Kelola Pengumuman";
		$output->back_button=base_url()."index.php/pengumuman";
		$this->show($output);
	}

	function cekdata($post_array,$primary_key){
		$penerima=$post_array['kepada'];
		$judul=$post_array['judul'];
		$isi=$post_array['isi'];
		$list_email=array();
		if($post_array['gambar']!=""){
			$gambar=base_url()."assets/uploads/files/".$post_array['gambar'];		
		}else{
			$gambar="";
		}

		if($post_array['attachment']!=""){
			$attachment=base_url()."assets/uploads/files/".$post_array['attachment'];
		}else{
			$attachment="";
		}
		
		$konten_email=$isi;		
		for($i=0;$i<count($penerima);$i++){
			$this->db->where('id_pegawai',$penerima[$i]);
			$result=$this->db->get('dosen')->result_array();
			//$tujuan=$result[0]['email'];
			array_push($list_email,$result[0]['email']);
				
		}
		//die();

		$this->sendemail($list_email[0],$list_email,$judul,$konten_email,$gambar,$attachment);
	}

	function user(){
		$this->load->model('model_pengumuman');
		$id_pegawai=$this->session->userdata('id_pegawai');
		$data['query']=$this->model_pengumuman->getUserPengumuman($id_pegawai)->result();
		$data['title1']='Pengumuman';
		$data['title2']='List Pengumuman';
		$this->showPengumumanUser($data);
	}

	function detail($id){
		$this->load->model('model_pengumuman');
		$data['query']=$this->model_pengumuman->detailPengumuman($id)->result();
		$data['title1']='Pengumuman';
		$data['title2']='Lihat Pengumuman';
		$this->showPengumumanDetail($data);
	}

	function show($output=null){
		$this->load->view('base/header');		
		$this->load->view('base/wrapper-open');
		$this->load->view('base/nav-header');
		$this->load->view('base/nav-sidebar_admin');		
		$this->load->view('layout/table',$output);		
		$this->load->view('base/footer');
		$this->load->view('base/control-sidebar');	
		$this->load->view('base/wrapper-close');
	}

	function showPengumumanUser($data){
		$this->load->view('base/header');		
		$this->load->view('base/wrapper-open');
		$this->load->view('base/nav-header');
		$this->load->view('base/nav-sidebar');		
		$this->load->view('layout/pengumuman_user',$data);		
		$this->load->view('base/extra_js');
		$this->load->view('base/footer');
		$this->load->view('base/control-sidebar');	
		$this->load->view('base/wrapper-close');
	}

	function showPengumumanDetail($data){
		$this->load->view('base/header');		
		$this->load->view('base/wrapper-open');
		$this->load->view('base/nav-header');
		$this->load->view('base/nav-sidebar');		
		$this->load->view('layout/detail_pengumuman',$data);		
		$this->load->view('base/footer');
		$this->load->view('base/control-sidebar');	
		$this->load->view('base/wrapper-close');
	}

	function getTanggal($post_array){
		$post_array['tanggal']=date('Y-m-d');
		return $post_array;
	}

	function sendemail($email,$bcc,$header,$pesan,$gambar,$file){
		$this->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.googlemail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "automail.app.si@gmail.com"; 
		$config['smtp_pass'] = "automailappsi";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
	    $config['crlf'] = "\r\n";

		$this->email->initialize($config);
		
		$this->email->from("Web App SI Fasilkom");
		$this->email->to($email); 
		if($gambar!=""){
			$this->email->attach($gambar);
		}
		if($file!=""){
			$this->email->attach($file);
		}	
		$this->email->bcc($bcc);
		$this->email->subject($header);
		$this->email->message($pesan);	
		

	    $res=$this->email->send();
		
		return true;
	}
}