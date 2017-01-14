<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index() {
		$data['page_title'] = '首页';
		
		$data['css_arr'] = array('');
		$data['js_arr'] = array('thirdpart/jquery.upload-1.0.2.js','thirdpart/jquery.tabledit.min.js', 
		'thirdpart/jquery.tablednd.js','thirdpart/jquery.tmpl.js');
		//$this->load->view('common/header', $data);
		
		$this->load->view('home/index');
		//$this->load->view('common/footer');
	}
}