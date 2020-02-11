<?php defined('BASEPATH') or exit("No direct script allowed");

class API extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->mysessioncheck->checkSession('id_pegawai','login');
	}

	function allEvent(){
		$this->load->model('event');
		$query=$this->event->getEvent();
		$data=array();
		foreach($query->result() as $row){
			$temp=array();
			$temp=array('title'=>$row->nama,
						'start'=>$row->tanggal,
						'end'=>date('Y-m-d',strtotime($row->tanggal.' + '.$row->jumlah_hari.' days')),
						'id'=>$row->id_event,
						'backgroundColor'=>$row->warna,
						'borderColor'=>$row->warna
				);
			array_push($data,$temp);
		}

		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function addEvent(){
		$this->load->model('event');
		$nama=$this->input->post('nama');
		$start=$this->input->post('tanggal');
		$warna=$this->input->post('warna');
		$res=$this->event->addEvent($nama,$start,$warna);

		$data=array('sukses'=>$res,
					'nama'=>$nama,
					'date'=>$start,
					'warna'=>$warna);

		header('Content-Type: application/json');
		echo json_encode($data);
		
	}

	function detailEvent(){
		$this->load->model('event');
		$id_event=$this->input->post('id');
		$res=$this->event->detailEvent($id_event);
		$data=array();
		foreach($res->result() as $row){
			if($row->jumlah_hari<=1){
				$pelaksanaan=$row->tanggal;
			}else{
				$pelaksanaan=$row->tanggal." Sampai Dengan ".date('Y-m-d',strtotime($row->tanggal.' + '.(($row->jumlah_hari)-1).' days'));
			}

			
			$temp=array(
				'status'=>'sukses',
				'nama'=>ucwords($row->nama),
				'pelaksanaan'=>ucwords($pelaksanaan),			
				'tempat'=>ucwords($row->tempat),
				'materi'=>ucwords($row->materi),
				);
			array_push($data,$temp);
		}

		header('Content-Type:application/json');
		echo json_encode($data);
	}

	function resizeday(){
		$day=$this->input->get('day');
		$id=$this->input->get('id');

		$data=array('jumlah_hari'=>$day);
		$this->db->where('id_event',$id);
		$exec=$this->db->update('event',$data);
		($exec)?$status='success':$status='fail';
		$result=array('status'=>$status);
		header('Content-Type:application/json');
		echo json_encode($result);
	}

}
