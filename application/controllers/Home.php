<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index() {
		$data['page_title'] = '首法-首页';
		
		$data['css_arr'] = array('font-awesome.css', 'style.css','flexslider.css');
		$data['js_arr'] = array('jquery.flexslider.js','jquery.inview.js', 'script.js');
		$this->load->view('common/header', $data);
		
		$this->load->view('home/index');
		$this->load->view('common/footer');
	}
	
	public function contract() {
		$data['page_title'] = '首法-免费合同';
		
		$data['css_arr'] = array('font-awesome.css', 'style.css');
		$data['js_arr'] = array( 'script.js');
		$this->load->view('common/header', $data);
		
		$this->load->view('home/contract');
		$this->load->view('common/footer');
	}
	//合同下载
	public function download() {
		$data['page_title'] = '首法-免费合同';
		
		$data['css_arr'] = array('font-awesome.css', 'style.css', 'download.css');
		$data['js_arr'] = array( 'script.js');
		$this->load->view('common/header', $data);
		
		$this->load->view('home/download');
		$this->load->view('common/footer');
	}
	//免费测评
	public function test() {
		$data['page_title'] = '首法-免费测评';
		
		$data['css_arr'] = array('font-awesome.css', 'style.css', 'test.css');
		$data['js_arr'] = array();
		$this->load->view('common/header', $data);
		
		$this->load->view('home/test');
		$this->load->view('common/footer');
	}
	
	public function service() {
		$data['page_title'] = '首法-投融资服务';
		
		$data['css_arr'] = array('font-awesome.css', 'style.css', 'service.css');
		$data['js_arr'] = array();
		$this->load->view('common/header', $data);
		
		$this->load->view('home/service');
		$this->load->view('common/footer');
	}
}