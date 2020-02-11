<?php
defined('BASEPATH') or exit('no direct access allowed');

class Model_login extends CI_Model{

	function doAuth($username,$password){
		$this->load->library('encryption');
		$this->db->where('username',$username)
				 ->where('status','aktif');
		$query=$this->db->get('akun')->result_array();
		for($i=0;$i<count($query);$i++){
			$res = $this->encryption->decrypt($query[$i]['password']);
			if($res == $password){
				return $query[$i];
			}
		}

		return false;
	}
}

?>