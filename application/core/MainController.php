<?php
class MainController extends MY_Controller{
	protected $_data;
	public function __construct(){
		parent::__construct();
		$mod=$this->router->fetch_module();
		$this->_data['module']=$mod;
		$this->_data['path']="$mod/template";

		$this->load->helper("seourl");
		$this->load->library("cart");
		$this->load->helper('form');

		
		
		$this->load->model("Mcategorie");
		// $config['baseurl']=base_url()."default/news/viewcate";
		$this->load->library("Menu");
		// $this->load->library("Menu",$config);
		$this->menu->setMenu($this->Mcategorie->listAllCate());
		$this->_data['menu']=$this->menu->callMenu();
	}
}