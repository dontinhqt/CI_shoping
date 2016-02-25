<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mproduct extends CI_Model {
	protected $_table="product";
    protected $column = array('name','category','price','date','image');
    protected $order = array('id' => 'desc');
	public function __construct(){
		parent::__construct();

	}

	public function inserProduct($data){
		$this->db->insert($this->_table,$data);
	}
	public function updateProdcut($data,$id)	{
		$this->db->where("id",$id);
		$this->db->update($this->_table,$data);

	}
	public function deleteProduct($id,$oldimg){
		$this->db->where("id",$id);
		unlink('./uploads/images/'.$oldimg);
		$this->db->delete($this->_table);
	}
	public function ListAllProdcut($record,$start){
		$this->db->limit($record,$start);
		$this->db->order_by("id","desc");
        return $this->db->get($this->_table)->result_array();
    }
    public function getProductById($id){
        $this->db->where("id",$id);
        return $this->db->get($this->_table)->row_array();
    }

    public function updateViewProduct($data,$id){
        $this->db->where("id",$id);
        $this->db->update($this->_table,$data);
    }
    public function sanphamlienquan($id){
        $this->db->limit(8,0);  
        $this->db->where('id !=',$id);
        return $this->db->get($this->_table)->result_array();
    }
    public function listsanphammoi(){
        $this->db->limit(8,0);
        $this->db->order_by("id","desc");
        return $this->db->get($this->_table)->result_array();
    }
    public function countAll(){
        return $this->db->count_all($this->_table);
    }
// -----------------------------------------------------------
    // sản phẩm xem nhiều
    public function listsanphamxemnhieu(){
        $this->db->limit(4,0);
        $this->db->order_by("view","desc");
        return $this->db->get($this->_table)->result_array();
    }

    public function listtinhthanh(){
        return $this->db->get("city")->result_array();
    }
    public function listquanhuyen($id){
        $this->db->where("id_city",$id);
        return $this->db->get("district")->result_array();
    }

    // datatalbes sản phẩm
    public function _get_datatables_query(){
        $this->db->from($this->_table);
        $i = 0;
        foreach ($this->column as $item)
        {
            if($_POST['search']['value'])
            {
                if($i===0)
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column) - 1 == $i)
                    $this->db->group_end();
            }
            $column[$i] = $item;
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->_table);
        return $this->db->count_all_results();
    }
    //end datables

}
