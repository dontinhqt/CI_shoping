<?php
class Index extends MainController
{
	public function __construct(){
		parent::__construct();
		$this->load->model("Mproduct");
	}

	public function index(){
		$this->_data['titlePage']="Trang chủ";
		$this->_data['loadPage']="index/index_view";
		$this->_data['loadslider']="index/index_slider";

		$this->_data['xemnhieu']=$this->Mproduct->listsanphamxemnhieu();
		$this->_data['spmoi']=$this->Mproduct->listsanphammoi();

		$this->load->view($this->_data['path'],$this->_data);
	}
}