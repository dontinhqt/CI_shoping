<?php
class Mautocomplete extends CI_Model{

    function check_in_client($name) {
       $this->db->select('name',false);
       $this->db->like('name',$name, 'both');
       $query = $this->db->get('product');
      if ($query->num_rows > 0) {
            foreach ($query->result() as $row) {
                $datas[] = $row->name;
            }

            echo json_encode($datas);
        } else {
            $datas[] = 'Oops! No suggestions found. Try a different search.';
            echo json_encode($datas);
        } 
    }
}
