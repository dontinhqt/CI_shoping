<?php
class Mcategorie extends CI_Model{
    protected $_table = "category";
    public function __construct(){
        parent::__construct();
    }

    public function listAllCate(){
        return $this->db->get($this->_table)->result_array();
    }

    public function deleteCate($id){
        $this->db->where("cate_id",$id);
        $this->db->delete($this->_table);
    }

    public function insertCate($data){
        $this->db->insert($this->_table,$data);
    }
    public function getCateById($id){
        $this->db->where("cate_id",$id);
        return $this->db->get($this->_table)->row_array();
    }
    public function updateCate($data,$id) {
        $this->db->where("cate_id",$id);
        $this->db->update($this->_table,$data);
    }
}