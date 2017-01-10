<?php
class Vercode extends  CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	public function addCode($mobile, $code) {
		$data = array('mobile' => $mobile, 'code' => $code,  'created_time' => date("Y-m-d H:i:s"));
		$this->db->insert('vercode', $data);
		return $this->db->insert_id();
		
	}
	
	public function updateCode($mobile, $code) {
		return $this->db->update('vercode', array('status' => 1), array('mobile' => $mobile, 'code' => $code));
	}
	
	public function updateAllByMobile($mobile) {
		return $this->db->update('vercode', array('status' => 1), array('mobile' => $mobile));
	}
	
	public function getCode($mobile) {
		$query = $this->db->get_where('vercode', array('mobile' => $mobile, 'status' => 0), 0, 1);
		$ret = $query->result_array();
		if(!empty($ret)) {
			return $ret[0]['code'];
		} else {
			return null;
		}
	}
}
