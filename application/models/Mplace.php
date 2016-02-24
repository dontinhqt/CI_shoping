<?php
class Mplace extends CI_Model{
	protected $_table="place";
	public function __construct(){
		parent::__construct();
	}
	public function insertPlace($data){
		$this->db->insert($this->_table,$data);
	}
	public function ListAllPlace(){
		$this->db->order_by("id","desc");
		return $this->db->get($this->_table)->result_array();
	}
	public function getPlacebyId($id) {
		$this->db->where('id', $id);
		return $this->db->get($this->_table)->row_array();
	}
	public function updatePlace($data, $id) {
		$this->db->where('id', $id);
		$this->db->update($this->_table, $data);
	}
	public function deletePlace($id){
		$this->db->where("id",$id);
		$this->db->delete($this->_table);
	}
}