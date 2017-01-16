<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 管理后台，通过session判断是否登陆
 * Enter description here ...
 * @author mikeye
 *
 */
class Admin extends CI_Controller {
	var $method;
	public function __construct() {
		parent::__construct();
		$this->method = $this->uri->segment(2, "index");
		$white_arr = array('login', 'check', 'out', 'error');
		if(!$this->session->admin && !in_array($this->method, $white_arr)) {
			redirect('/admin/login');
		}
	}
	public function login(){
		$data['error'] = $this->input->get("error");
		$data['page_title'] = '登陆';
		$data['css_arr'] = array('signin.css');
		$data['left_menu'] = "";
		$this->load->helper('captcha');
		$vals = array(
    		'img_path'  => FCPATH . '/static/captcha/',
			'word_length'   => 4,
			'font_size' => 16,
    		'img_url'   => $this->config->item('base_url') . "/static/captcha/"
		);
		$cap = create_captcha($vals);
		//print_r($cap);
		$data['img'] = $cap['image'];
		$this->session->captcha = strtolower($cap['word']);
		$this->load->view('common/admin_header', $data);
		$this->load->view('/admin/login', $data);
		$this->load->view('common/admin_footer');
	}
	public function index() {
		$data['page_title'] = '管理后台';
		
		$data['css_arr'] = array('dashboard.css');
		$data['js_arr'] = array('thirdpart/jquery.upload-1.0.2.js','thirdpart/jquery.tabledit.min.js', 
		'thirdpart/jquery.tablednd.js','thirdpart/jquery.tmpl.js');
		$data['left_menu'] = $this->method;
		$this->load->view('common/admin_header', $data);
		$this->load->view('common/admin_topmenu');
		$this->load->view('admin/index');
		$this->load->view('common/admin_footer');
	}
	public function order_manage() {
		$data['page_title'] = '订单管理';
		
		$data['css_arr'] = array('dashboard.css','thirdpart/jqpagination.css');
		$data['js_arr'] = array('thirdpart/jquery.upload-1.0.2.js','thirdpart/jquery.tabledit.min.js', 
		'thirdpart/jquery.tablednd.js','thirdpart/jquery.tmpl.js','thirdpart/jquery.jqpagination.min.js', 'admin/order_manage.js');
		$data['left_menu'] = $this->method;
		$this->load->view('common/admin_header', $data);
		$this->load->view('common/admin_topmenu');
		$this->load->view('admin/order_manage');
		$this->load->view('common/admin_footer');
	}
	public function order_data() {
		$page = $this->input->post("page");
		if(empty($page)) {
			$page = 1;
		}
		$limit = 20;
		$start = ($page - 1) * $limit;
		$this->load->model('order');
		$total = $this->order->getCount();
		$page_count = ceil($total/$limit);
		$list = $this->order->findByCondition($start, $limit);
		$i = 1;
		$order_status_map = array('1' => '待处理' , '2' => '已受理', '3' => '已处理','4' => '完成');
		if(!empty($list)) {
			foreach($list as &$row) {
				$row['index'] = $i;
				$row['status'] = $order_status_map[$row['order_status']];
				$i++;
			}
			unset($row);
		}
		$data = array('ret' => 0, 'data' => array('page_count' => $page_count, 'list' => $list));
		echo json_encode($data);
		die(0);
	}
	public function list_contract() {
		$data['page_title'] = '管理合同';
		
		$data['css_arr'] = array('dashboard.css');
		$data['js_arr'] = array('thirdpart/jquery.upload-1.0.2.js','thirdpart/jquery.tabledit.min.js', 
		'thirdpart/jquery.tablednd.js','thirdpart/jquery.tmpl.js');
		$data['left_menu'] = $this->method;
		$this->load->view('common/admin_header', $data);
		$this->load->view('common/admin_topmenu');
		$this->load->view('admin/list_contract');
		$this->load->view('common/admin_footer');
	}
	public function add_contract() {
		$data['page_title'] = '新建免费合同';
		
		$data['css_arr'] = array('dashboard.css');
		$data['js_arr'] = array('thirdpart/jquery.upload-1.0.2.js','thirdpart/jquery.tabledit.min.js', 
		'thirdpart/jquery.tablednd.js','thirdpart/jquery.tmpl.js');
		$data['left_menu'] = $this->method;
		$this->load->view('common/admin_header', $data);
		$this->load->view('common/admin_topmenu');
		$this->load->view('admin/add_contract');
		$this->load->view('common/admin_footer');
	}
	public function check() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$word = strtolower($this->input->post("word"));
		//echo $email; echo $password;die(0);
		if($email == 'sofar@qq.com' && $password == '123456' && $word == $this->session->captcha) {
			$this->load->library('session');
			$this->session->admin = 1;
			$this->session->captcha = '';
			redirect('/admin/');
		} else {
			redirect('/admin/login?error=1');
		}
	}
	
	public function logout() {
		$this->session->admin = 1;
		$this->session->captcha = '';
		redirect('/admin/login');
		
	}
	public function error() {
		$data['page_title'] = '登陆失败';
		$data['css_arr'] = array('signin.css');
		$this->load->view('common/admin_header', $data);
		$this->load->view('admin/login');
		$this->load->view('common/admin_footer');
	}
	
}