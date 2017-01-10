<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
//后台执行脚本
class Backend extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!is_cli()){
			exit('No direct script access allowed');
		}
	}
	
	public function index() {
		//echo "here";
	}
}
?>