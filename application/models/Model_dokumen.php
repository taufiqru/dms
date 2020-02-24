<?php 
defined('BASEPATH') or exit('No Direct Script Allowed');

Class Model_dokumen extends CI_Model{
	function getJumlahDokumen(){
		$this->db->select('count(id_dokumen) as jumlah_dokumen');
		$query=$this->db->get('dokumen')->result_array();
		return $query;
	}

	function getFolder($level=null){
		$this->db->select('*');
		$this->db->where('level',$level);
		$query=$this->db->get('kategori_dokumen')->result_array();
		return $query;
	}

	function getKategoriDokumen($id){
		$this->db->select('*');
		$this->db->where('id_kategori_dokumen',$id);
		$query=$this->db->get('kategori_dokumen')->result_array();
		return $query;
	}

	function getFolderRoot(){
		$this->db->select('id_folder,nama');
		$this->db->where('parent','#');
		$query = $this->db->get('folder')->result_array();
		return $query;
	}

	function getMaxIdFolder(){
		$this->db->select_max('id_folder');
		$this->db->where('parent','#');
		$res = $this->db->get('folder')->result_array();
		return $res[0]['id_folder']+1;
	}

	function addFolderRoot($val){
		return $this->db->insert('folder',$val);
	}

	function editFolderRoot($val,$idFolder){
		$this->db->where('id_folder',$idFolder);
		return $this->db->update('folder',$val);
	}

	function deleteFolderRoot($idFolder){
		$this->db->where('id_folder',$idFolder);
		return $this->db->delete('folder');
	}

	function getListChild($id){
		$this->db->where('parent',$id);
		$this->db->order_by('nama','ASC');
		return $this->db->get('folder')->result();
	}

	function counterRead($idfile){
		$this->db->where('id_file',$idfile);
		$this->db->select('dibaca');
		$counter = $this->db->get('file')->result_array();
		print($idfile);
		print_r($counter);
		$sum = $counter[0]['dibaca']+1;

		$this->db->set('dibaca',$sum);
		$this->db->where('id_file',$idfile);
		return $this->db->update('file');
	}
}
?>