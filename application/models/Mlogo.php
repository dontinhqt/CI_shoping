<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mlogo extends CI_Model {
	protected $_table = "slide_logo_banner";
	public function __construct(){
		parent::__construct();

	}

	public function listAllLogo(){
		$this->db->select('id,name,image,keyword');
		$this->db->where('name','logo');
		$this->db->order_by("id","desc");
		return $this->db->get($this->_table)->result_array();
	}

	public function insertLogo($data){
        $this->db->insert($this->_table,$data);
        return $this->db->insert_id();
   	}

   public function delLogo($id){
   		$this->db->delete($this->_table,array('id' => $id));
   		return true;
   }

   public function getImage($id){
   		$this->db->where('id',$id);
   		return $this->db->get($this->_table)->row_array();
   }

   public function updateLogo($data,$id){
		$this->db->where('id', $id);
		$this->db->update($this->_table, $data);
   }
}
