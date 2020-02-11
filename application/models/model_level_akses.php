<?php
defined('BASEPATH') or exit('no direct script allowed');

Class Model_level_akses extends CI_Model{

	function getListLevelAkses(){
		return $this->db->get('level_akses')->result_array();
	}

	function addListLevelAkses($data){
		return $this->db->insert('level_akses',$data);
	}

	function rmvListLevelAkses($data){
		$this->db->where('id_level',$data);
		return $this->db->delete('level_akses');
	}

	function doUpsert($level,$folder){
		$this->db->where('id_level_akses',$level);
		$this->db->where('id_folder_root',$folder);
		$res = count($this->db->get('hak_akses')->result_array());
		if($res<1){
		$data= array(
				'id_level_akses' => $level,
				'id_folder_root' => $folder
				);
		return $this->db->insert('hak_akses',$data);	
		}else{
			return false;
		}
	}

	function doRevoke($level,$folder){
		$this->db->where('id_level_akses',$level);
		$this->db->where('id_folder_root',$folder);
		return $this->db->delete('hak_akses');
	}

	function getAccess($id_level){
		$this->db->where('id_level_akses',$id_level);
		return $this->db->get('hak_akses')->result_array();
	}

}
?>