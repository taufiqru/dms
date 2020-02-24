<?php
defined('BASEPATH') OR exit('no direct script allowed');

class Dokumen extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->mysessioncheck->checkSession('no_pegawai','login');
	}

	function index($level='parent'){
		$output['title_1']="Repositori";
		$output['title_2']="PT Bukit Asam Tbk";
		$this->show('layout/tree',$output);
	}

	function level_dokumen($level){
		$this->load->model('model_dokumen');
		return $this->model_dokumen->getFolder($level);
	}

	function setWatermark(){
		$file = $_GET['file'];
		$urlSource = base_url().'uploads/'.$file;
		$this->load->library('WatermarkPDF/WatermarkPDF');
		$this->toPDF($urlSource);
	}

	function toPDF($filepath){
		$pdfFile = $filepath;
		print($pdfFile);
		$watermarkText = "CONFIDENTIAL";
		$pdf = new WatermarkPDF($pdfFile, $watermarkText);
		$pdf->AddPage();
		$pdf->SetFont('Arial', '', 12);

		if($pdf->numPages>1) {
		    for($i=2;$i<=$pdf->numPages;$i++) {
		        $pdf->_tplIdx = $pdf->importPage($i);
		        $pdf->AddPage();
		    }
		}

		$pdf->Output();
	}

	function show($page,$output=null){
		$this->load->view('base/header');		
		$this->load->view('base/wrapper-open');
		$this->load->view('base/nav-header');
		$this->load->view('base/nav-sidebar_admin');
		$this->load->view($page,$output);		
		$this->load->view('base/footer');
		$this->load->view('base/control-sidebar');	
		$this->load->view('base/wrapper-close');
	}

	function getidakun($post_array){
		$post_array['id_akun']=$this->session->userdata('id_pegawai');
		return $post_array;
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

	function addfolder(){
		$id=$_GET['id'];
		$parent=$_GET['id_parent'];
		$position=$_GET['position'];
		$nama=$_GET['nama'];

		$input=array(
			'id_folder'=>$id,
			'parent'=>$parent,
			'position'=>$position,
			'nama'=>$nama
			);
		$exec=$this->db->insert('folder',$input);
		$id = $this->db->insert_id();

		if($exec){
			$status="success";
		}else{
			$status="fail";
		}

		$result=array('id'=>$id, 'nama'=>$nama, 'status'=>$status);
		header('Content-Type: application/json; charset=utf-8');
    	echo json_encode($result);
	}

	function renamefolder(){
		$id=$_GET['id'];
		$nama=$_GET['nama'];
		$this->db->set('nama',$nama);
		$this->db->where('id_folder',$id);
		$exec=$this->db->update('folder');

		if($exec){
			$status='success';
		}else{
			$status='fail';
		}
		$result=array('id'=>$id, 'nama'=>$nama, 'status'=>$status);
		header('Content-Type: application/json; charset=utf-8');
    	echo json_encode($result);
	}

	function listfolder(){
		//$id=$_GET['id'];
		$level = $this->session->userdata('level_akses_folder');
		$this->db->order_by('nama','ASC');
		$sql = "select * from hak_akses a,folder b where b.id_folder=a.id_folder_root and a.id_level_akses = '$level'";
		$query=$this->db->query($sql)->result();
		//$this->db->where('parent',$id);
		// $query=$this->db->get('folder')->result();
		
		$output=array();
		
		foreach($query as $row){
			
			unset($temp);
			$temp=array();
			$temp['id']=$row->id_folder;
			$temp['parent']=$row->parent;
			$temp['text']=$row->nama;
			$temp['children'] = true;
			array_push($output,$temp);
		}
		header("Content-Type:application/json");
		echo json_encode($output);
	}

	function listchild(){
		$id=$_GET['id'];
		//break;
		$this->load->model('Model_dokumen');
		$query = $this->Model_dokumen->getListChild($id);
		$output=array();
		foreach($query as $row){
			unset($temp);
			$temp=array();
			$temp['id']=$row->id_folder;
			$temp['parent']=$row->parent;
			$temp['text']=$row->nama;
			$temp['children'] = true;
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
		//$allowedExtensions=array('png','jpeg','jpg','pdf','doc','docx');
		$allowedExtensions=array('pdf');
		$sizeLimit=80*1024*1024;
		$uploader=new qqFileUploader($allowedExtensions,$sizeLimit);
		$url = 'uploads/';
		$result=$uploader->handleUpload($url);
		//echo $result;
			
		echo htmlspecialchars(json_encode($result),ENT_NOQUOTES);		
	}

	function recordUploadedDoc(){
		$data=array(
				'file'=>$this->input->post('filename'),
				'folder'=>$this->input->post('folder'),
				);
		$query=$this->db->insert('file',$data);
	}

	function readCounter(){
		$id = $_GET['idfile'];
		$this->load->model('Model_dokumen');
		$this->Model_dokumen->counterRead($id);

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
}