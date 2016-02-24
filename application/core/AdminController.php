<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class AdminController extends MY_Controller{
	protected $_data;
	public function __construct(){
		parent::__construct();
		$mod=$this->router->fetch_module();
  		$this->_data['module']=$mod;
  		$this->_data['path']="$mod/template";
  		if($this->session->userdata("level")!=1 && $this->uri->segment(2)!="vertify")		{
			redirect(base_url()."admin/vertify/login");
		}
	}
}