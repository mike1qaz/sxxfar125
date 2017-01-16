<?php
class Order extends  CI_Model {
	public function __construct() {
		parent::__construct();
	}
	public function findByCondition($start = 0, $limit = 10, $condition = '') {
		$sql = "select * from orders ";
		if(!empty($condition)) {
			$sql .= " where " . $condition;
		}
		$sql .= " order by created_time desc limit " . $start . "," . $limit;
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getCount() {
		return $this->db->count_all_results('orders');
	}
	
	public function findById($order_id) {
		$query = $this->db->get_where('orders', array('id' => $order_id), 0, 1);
		$ret = $query->result_array();
		if(!empty($ret)) {
			return $ret[0];
		} else {
			return null;
		}
	}
}
	