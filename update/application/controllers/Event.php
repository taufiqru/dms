<?php 
defined('BASEPATH') OR exit('no direct script allowed');

class Event extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->mysessioncheck->checkSession('id_pegawai','login');
	}

	function index(){
		$this->show('event');
	}

	function event_note(){
		$this->load->library('grocery_CRUD');
		$crud=new grocery_CRUD();
		$crud->unset_jquery();
		$crud->set_table('event');
		$crud->set_relation_n_n('peserta_hadir','peserta_hadir','dosen','id_event','id_pegawai','nama','priority');
		$crud->unset_read_fields('warna');
		
		$crud->unset_edit_fields(array('nama','tanggal','jumlah_hari','tempat','materi','warna'));
		$crud->columns(array('tanggal','nama','notulen'));
		$crud->unset_add();
		$crud->unset_delete();
		$output=$crud->render();
		$state=$crud->getState();
		if($state=='list' || $state=='success'){
			redirect(base_url()."index.php/event");
		}
		
		$this->show('event_table',$output);
	}

	function event_table(){
		$this->load->library('grocery_CRUD');
		$crud=new grocery_CRUD();
		$crud->unset_jquery();
		$level=$this->session->userdata('level');
		$crud->set_table('event');
		$crud->set_relation_n_n('peserta','peserta_event','dosen','id_event','id_pegawai','nama','priority');
		/*
		set_relation_n_n : display field, table1,table2,relation between primary table and table1,relation between tabel1 and table 2, display value, priority 
		*/
		$crud->unset_read_fields('notulen','warna');
		$crud->fields('nama','tanggal','jumlah_hari','tempat','materi','peserta');	
		$crud->display_as('peserta','Undangan Peserta');
		$crud->display_as('nama','Nama Agenda');
		$crud->display_as('tanggal','Tanggal Pelaksanaan');
		$crud->display_as('jumlah_hari','Lama Kegiatan (Hari)');
		$crud->columns(array('tanggal','nama','materi'));
		if($level!='Admin'){
			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_delete();	
		}
		$crud->callback_after_update(array($this,'preparingMail'));
		$output=$crud->render();
		$state=$crud->getState();
		if($state=='list' || $state=='success'){
			redirect(base_url()."index.php/event");
		}
		
		$this->show('event_table',$output);
	}

	function preparingMail($post_array,$primary_key){
		$recipient=$post_array['peserta'];
		$list_email=array();
		//$string_email="";
		for($i=0;$i<count($recipient);$i++)
		{
			$this->db->select('email');
			$this->db->where('id_pegawai',$recipient[$i]);
			$data_mail=$this->db->get('dosen')->result_array();
			array_push($list_email,$data_mail[0]['email']);
			//$string_email="'$data_mail[0],"."$string_email'";
		}
		$nama_agenda=$post_array['nama'];
		$tanggal=$post_array['tanggal'];
		$tempat=$post_array['tempat'];
		$materi=$post_array['materi'];
		$pesan="Kepada Bapak/Ibu Dosen <br> <br>"
		."Diharapkan kehadiran bapak/ibu pada agenda kegiatan : <br>"
		."Agenda <tab> : ".$nama_agenda."<br> "
		."Tanggal <tab> : ".$tanggal." <br> "
		."Tempat <tab> : ".$tempat." <br> "
		."Materi <tab> : ".$materi." <br> "
		."Atas kehadiran bapak dan ibu kami ucapkan terima kasih. <br> <br>"
		."Catatan : Email Dibuat oleh Sistem, tidak perlu dibalas." 
		;
		
		$subject="Undangan ".$nama_agenda;
		$to=$list_email[0];
		$bcc=$list_email;
		
		//print_r($bcc); die();
		$this->sendemail($to,$bcc,$subject,$pesan);
	}

	function sendemail($to,$bcc,$subject,$pesan){
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
		$this->email->to($to); 	
		$this->email->cc(implode(",",$bcc));
		$this->email->subject($subject);
		$this->email->message($pesan);	

	    $res=$this->email->send();
	    //$this->email->print_debugger(array('headers'));
		
		return true;
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
		$this->load->view('base/control-sidebar');	
		$this->load->view('base/calendar');
		$this->load->view('base/wrapper-close');
	}
}