<?php
class Mautocomplete extends CI_Model{
  public function __construct(){
    parent::__construct();
  }
      public function GetRow($keyword) {        
        $this->db->order_by('id', 'DESC');
        $this->db->like("name", $keyword);
        return $this->db->get('product')->result_array();
    }

}
