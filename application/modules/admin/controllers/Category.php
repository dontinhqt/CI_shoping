<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends AdminController {
	public function __construct(){
		parent::__construct();
		$this->load->model("Mcategorie");
        $this->load->library('NestedsetBie', array('table' => 'category'));

	}

	public function index(){
        $this->_data['titlePage']="List All Categorie";
        $this->_data['loadPage']="category/index_category";
        $this->load->helper("menu");
        $listAllCate = $this->Mcategorie->listAllCate();
        $this->_data['cate'] = category(0,$listAllCate);

		$this->_data['mess']= $this->session->flashdata("flash_mess");
        $this->load->view($this->_data['path'],$this->_data);

	}
    public function nestedset(){
        $this->nestedsetbie->get();
        $this->nestedsetbie->recursive(0, $this->nestedsetbie->set());
        $this->nestedsetbie->action();
    }
    public function add(){
    	$this->load->helper("menu");
    	$this->load->library("form_validation");
    	$this->load->helper("form");
    	$this->_data['cate']=$this->Mcategorie->listAllCate();
        $this->_data['titlePage']="Thêm chuyên mục";
        $this->_data['loadPage']="category/add_category";
        if($this->input->post("ok")){
        	$this->form_validation->set_rules("txttitle"," Tên danh mục","required");
        	$this->form_validation->set_message("required","%s không được bỏ trống");
        	// bọc vởi div nào đó
        	$this->form_validation->set_error_delimiters('<label class="control-label text-red" for="inputError"><i class="fa fa-times-circle-o"></i>', '</label>');
        	if($this->form_validation->run()){
        		$data_insert=array(
                "cate_title"=> $this->input->post("txttitle"),
                "cate_parent"=> $this->input->post("cate")
	            );
	            $this->Mcategorie->insertCate($data_insert);
	            $this->session->set_flashdata('flash_mess','Thêm chuyên mục thành công');
                $this->nestedset();
	            redirect(base_url()."admin/category/index");

        	}
        }
        $this->load->view($this->_data['path'],$this->_data);

    }

    public function del($param){
        $this->load->model("Mcategorie");
        $this->Mcategorie->deleteCate($param);
        $this->session->set_flashdata("flash_mess","Xóa category thành công");
        $this->nestedset();
        redirect(base_url()."admin/category/index");
    }

    public function edit($param){
        $this->load->helper("menu");
        $this->load->model("Mcategorie");
        $this->load->library("form_validation");
        $this->_data['titlePage']="Edit A Categorie";
        $this->_data['loadPage']="category/edit_category";

        $this->form_validation->set_rules("txttitle"," Tên danh mục","required");
        $this->form_validation->set_message("required","%s không được bỏ trống");
        // bọc vởi div nào đó
        $this->form_validation->set_error_delimiters('<label class="control-label text-red" for="inputError"><i class="fa fa-times-circle-o"></i>', '</label>');
        if($this->form_validation->run()) {
            $data_update = array(
                "cate_title"=>$this->input->post("txttitle"),
                "cate_parent"=>$this->input->post("cate")
            );
            $this->Mcategorie->updateCate($data_update,$param);
            $this->session->set_flashdata("flash_mess","Sửa danh mục thành công !!!");
            $this->nestedset();
            redirect(base_url()."admin/category/index");
        }

        $this->_data['cate']= $this->Mcategorie->getCateById($param);
        $this->_data['menu']= $this->Mcategorie->listAllCate($param);
        $this->load->view($this->_data['path'],$this->_data);

    }
}
