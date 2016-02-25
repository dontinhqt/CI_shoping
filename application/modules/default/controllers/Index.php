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


	public function Read(){
		$ao_id = 1;
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('cate_id', $ao_id);
		$result = $this->db->get()->row_array();
		$this->db->flush_cache();
		/*if($result['rgt'] - $result['lft'] > 1){
			$this->db->select('*');
			$this->db->from('category');
			$this->db->where(array(
				'lft >=' => $result['lft'],
				'rgt <=' => $result['rgt'],
			));
			$result_2 = $this->db->get()->result_array();
			$this->db->flush_cache(); */
		if(isset($result) && is_array($result) && count($result)){
		$this->db->select('id, name, code, price,category');
		$this->db->from('product');
		$this->db->where('(category IN (SELECT cate_id FROM category WHERE lft >= '.$result['lft'].' AND rgt <= '.$result['rgt'].'))');
		$result_2 = $this->db->get()->result_array();
		$this->db->flush_cache();
		print_r($result_2);die();
		 }
	}
}


