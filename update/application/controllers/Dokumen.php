<?php
defined('BASEPATH') OR exit('no direct script allowed');

class Dokumen extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->mysessioncheck->checkSession('id_pegawai','login');
	}

	function index($level='parent'){
		$output['level']=$this->level_dokumen($level);
		$output['dokumen']=$level;
		$this->show('repository/dashboard_repository',$output);
	}

	function repository($kategori=null){
		$this->load->model('model_dokumen');
		$this->load->library('grocery_CRUD');
		$crud=new grocery_CRUD();
		$crud->unset_jquery();
		
		$level=$this->session->userdata('level');
		$id=$this->session->userdata('id_pegawai');
		
		$crud->set_field_upload('dokumen');
		$crud->set_table('dokumen');
		if($level!='Admin'){
			$crud->where('id_akun',$id);					
		}else{
			if(isset($kategori)){
				$crud->where('dokumen.id_kategori_dokumen',$kategori);
			}	
		}

		$crud->set_relation('id_kategori_dokumen','kategori_dokumen','nama_kategori');
		$crud->display_as('id_kategori_dokumen','Folder');		
		$crud->columns(array('judul','keterangan','download'));
		$crud->fields('judul','dokumen','id_kategori_dokumen','keterangan');
		$crud->field_type('id_akun','invisible');
		$crud->required_fields('judul','id_kategori_dokumen','dokumen');
		$crud->callback_column('download', array($this,'_download_button'));
		$crud->callback_before_insert(array($this,'getIdAkun'));
		$crud->callback_before_update(array($this,'getIdAkun'));
		$output=$crud->render();
		
		($kategori!="add"?$nama_kategori=$this->model_dokumen->getKategoriDokumen($kategori)[0]['nama_kategori']:$nama_kategori=$this->uri->segment(4));
		
		$output->title_1=$nama_kategori;
		$output->title_2="Kelola Dokumen $nama_kategori";
		$output->back_button=base_url()."index.php/dokumen";
		$this->show('layout/table',$output);		
	}

	function level_dokumen($level){
		$this->load->model('model_dokumen');
		return $this->model_dokumen->getFolder($level);
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
		$this->load->view('base/wrapper-close');
	}

	function getidakun($post_array){
		$post_array['id_akun']=$this->session->userdata('id_pegawai');
		return $post_array;
	}

	function _download_button($value,$row){
		return "<a href='".base_url()."assets/uploads/files/".$row->dokumen."' class='btn bg-green btn-flat'><li class='fa fa-download'> &nbsp;</li>Download</a>";
	}

	function dokumentree(){
		$output['title_1']="Repositori";
		$output['title_2']="Repositori Ver. 2";
		$this->show('layout/tree',$output);
	}

	function deletefilefunc($idfile,$file){
		$this->db->where('id_file',$idfile);
		$status=$this->db->delete('file');
		$filepath="uploads/".$file;
		if(file_exists($filepath)){
			unlink($filepath);
		}
		return $status;
	}

	function deletefile(){
		$idfile=$_GET['id'];
		$file=$_GET['file'];
		
		$status=$this->deletefilefunc($idfile,$file);
		$data=array(
				'status'=>$status,
				'remove'=>$file
			);
		header('Content-Type: application/json; charset=utf-8');
    	echo json_encode($data);

	}

	function deleteskripsifunc($id,$dokumen){
		$this->db->where('id_skripsi',$id);
		$status=$this->db->delete('skripsi');
		$filepath="<?=base_url()?>assets/uploads/files/".$dokumen;
		if(file_exists($filepath)){
			unlink($filepath);
		}
		return $status;
	}

	function deleteskripsi(){
		$id=$_GET['id'];
		$dokumen=$_GET['dokumen'];
		
		$status=$this->deleteskripsifunc($id,$dokumen);
		$data=array(
				'status'=>$status,
				'remove'=>$dokumen
			);
		header('Content-Type: application/json; charset=utf-8');
    	echo json_encode($data);

	}

	function deletekpfunc($id,$dokumen){
		$this->db->where('id_kp',$id);
		$status=$this->db->delete('kerja_praktek');
		$filepath="<?=base_url()?>assets/uploads/files/".$dokumen;
		if(file_exists($filepath)){
			unlink($filepath);
		}
		return $status;
	}

	function deletekp(){
		$id=$_GET['id'];
		$dokumen=$_GET['dokumen'];
		
		$status=$this->deletekpfunc($id,$dokumen);
		$data=array(
				'status'=>$status,
				'remove'=>$dokumen
			);
		header('Content-Type: application/json; charset=utf-8');
    	echo json_encode($data);

	}

	function deletepenelitianfunc($id,$dokumen){
		$this->db->where('id_penelitian',$id);
		$status=$this->db->delete('penelitian');
		$filepath="<?=base_url()?>assets/uploads/files/".$dokumen;
		if(file_exists($filepath)){
			unlink($filepath);
		}
		return $status;
	}

	function deletepenelitian(){
		$id=$_GET['id'];
		$dokumen=$_GET['dokumen'];
		
		$status=$this->deletepenelitianfunc($id,$dokumen);
		$data=array(
				'status'=>$status,
				'remove'=>$dokumen
			);
		header('Content-Type: application/json; charset=utf-8');
    	echo json_encode($data);

	}

	function addfolder(){
		$id=$_GET['id'];
		$parent=$_GET['id_parent'];
		$position=$_GET['position'];
		$text=$_GET['text'];

		$input=array(
			'id_folder'=>$id,
			'parent'=>$parent,
			'position'=>$position,
			'text'=>$text
			);
		$exec=$this->db->insert('folder',$input);

		if($exec){
			$status="success";
		}else{
			$status="fail";
		}

		$result=array('id'=>$id, 'text'=>$text, 'status'=>$status);
		header('Content-Type: application/json; charset=utf-8');
    	echo json_encode($result);

	}

	function renamefolder(){
		$id=$_GET['id'];
		$text=$_GET['text'];

		$this->db->set('text',$text);
		$this->db->where('id_folder',$id);
		$exec=$this->db->update('folder',$data);

		if($exec){
			$status='success';
		}else{
			$status='fail';
		}

		$result=array('id'=>$id, 'text'=>$text, 'status'=>$status);
		header('Content-Type: application/json; charset=utf-8');
    	echo json_encode($result);
	}

	function listfolder(){
		$query=$this->db->get('folder')->result();
		$output=array();
		foreach($query as $row){
			unset($temp);
			$temp=array();
			$temp['id']=$row->id_folder;
			$temp['parent']=$row->parent;
			$temp['text']=$row->text;
			array_push($output,$temp);
		}
		header("Content-Type:application/json");
		echo json_encode($output);
	}

	function movefolder(){
		$id=$_GET['id'];
		$parent=$_GET['parent'];
		$position=$_GET['position'];
		$data=array(
				'parent'=>$parent,
				'position'=>$position
			);
		$this->db->where('id_folder',$id);
		$exec=$this->db->update('folder',$data);
		($exec)?$status='success':$status='fail';
		$result=array('status'=>$status);
		header("Conteny-Type:application/json");
		echo json_encode($result);
	}

	function deletefolder(){
		//notes : prevent delete if not empty
		$id=$_GET['id'];		
		//delete all files in folder as well
		$this->db->where('folder',$id);
		$exec=$this->db->get('file')->result();
		foreach($exec as $row){
			$this->deletefilefunc($row->id_file,$row->file);
		}

		$this->db->where('id_folder',$id);
		$exec=$this->db->delete('folder');
		($exec)?$status='success':$status='fail';

		$result=array('status'=>$status);
		header("Content-Type:application/json");
		echo json_encode($result);
	}

	function copyfolder(){
		$id=$_GET['id'];
		$parent=$_GET['parent'];
		echo "ID :".$id.", Parent : ".$parent;
		die();
	}

	function uploaderview(){
		$this->load->view('layout/uploader');
	}

	function uploaddokumen(){
		$this->load->library('qquploadedfilexhr');
		$allowedExtensions=array('png','jpeg','jpg','pdf','doc','docx');
		$sizeLimit=2*1024*1024;

		$uploader=new qqFileUploader($allowedExtensions,$sizeLimit);
		
		$result=$uploader->handleUpload('uploads/');
		
		if($result){
			$data=array(
				'file'=>$_POST['qqfilename'],
				'folder'=>$this->uri->segment(3),
				);
			$query=$this->db->insert('file',$data);
		}		
		echo htmlspecialchars(json_encode($result),ENT_NOQUOTES);		
	}

	function getfilelist(){
		//Important to NOT load the model and let the library load it instead.  
		$this -> load -> library('Datatable', array('model' => 'model_file', 'rowIdCol' => 'f.id_file'));
        
        //format array is optional, but shown here for the sake of example
        $json = $this -> datatable -> datatableJson(
			array(
				'a_date_col' => 'date',
				'a_boolean_col' => 'boolean',
				'a_percent_col' => 'percent',
				'a_currency_col' => 'currency'
			)
		);
        
        $this -> output -> set_header("Pragma: no-cache");
        $this -> output -> set_header("Cache-Control: no-store, no-cache");
        $this -> output -> set_content_type('application/json') -> set_output(json_encode($json));

	}

	function getSkripsiList(){
		$this -> load -> library('Datatable',array('model'=>'model_skripsi', 'rowIdCol'=>'s.id_skripsi'));
		$json=$this -> datatable-> datatableJson(
			array(
				'a_date_col'=>'date',
				'a_boolean_col'=>'boolean',
				'a_percent_col'=>'percent',
				'a_currency_col'=>'currency'
			)
		);

		$this-> output-> set_header("Pragma:no-cache");
		$this-> output-> set_header("Cache-Control:no-store,nocache");
		$this-> output-> set_content_type("application/json")-> set_output(json_encode($json));
	}

	function getKPList(){
		$this -> load -> library('Datatable',array('model'=>'model_kp', 'rowIdCol'=>'k.id_kp'));
		$json=$this -> datatable-> datatableJson(
			array(
				'a_date_col'=>'date',
				'a_boolean_col'=>'boolean',
				'a_percent_col'=>'percent',
				'a_currency_col'=>'currency'
			)
		);

		$this-> output-> set_header("Pragma:no-cache");
		$this-> output-> set_header("Cache-Control:no-store,nocache");
		$this-> output-> set_content_type("application/json")-> set_output(json_encode($json));
	}

	function getPenelitianList(){
		$this -> load -> library('Datatable',array('model'=>'model_penelitian', 'rowIdCol'=>'p.id_penelitian'));
		$json=$this -> datatable-> datatableJson(
			array(
				'a_date_col'=>'date',
				'a_boolean_col'=>'boolean',
				'a_percent_col'=>'percent',
				'a_currency_col'=>'currency'
			)
		);

		$this-> output-> set_header("Pragma:no-cache");
		$this-> output-> set_header("Cache-Control:no-store,nocache");
		$this-> output-> set_content_type("application/json")-> set_output(json_encode($json));
	}
}