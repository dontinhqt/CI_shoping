<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends AdminController {
	public function __construct(){
		parent::__construct();
		@session_start();
		$user=$this->session->userdata("username");
		$_SESSION['KCFINDER']['disabled']=false;
		$_SESSION['KCFINDER']['uploadURL']=base_url()."uploads/images";
		$this->load->model("Mproduct");

		$this->load->model('Muser');


	}

	public function index(){
		$this->_data['mess'] = $this->session->flashdata("flash_mess");
		$this->_data['titlePage']="Trang Thêm Sản Phẩm";
		$this->_data['loadPage']="product/index_product";

		$config["total_rows"]=$this->Mproduct->countAll();
		$config["per_page"]=4;
		$config['first_link'] = 'First';
        $config['last_link'] = 'End';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Preview';
        $config['cur_tag_open'] = '<span id="current_page"><label>';
        $config["base_url"]=base_url()."admin/product/index/";
        $config['cur_tag_close'] = '</label></span>';
        $config['num_tag_open'] = '<span>';
        $config['num_tag_close'] = '</span>';
        $config['full_tag_open'] = '<p id="pager_links">';
        $config['full_tag_close'] = '</p>';
		$config["uri_segment"]=4;
		$this->load->library("pagination",$config);
		$start=$this->uri->segment(4);

		$this->_data['info']=$this->Mproduct->ListAllProdcut($config["per_page"],$start);
		$this->_data['pagelink']=$this->pagination->create_links();

		$this->load->view($this->_data["path"],$this->_data);
	}

	public function add()	{
		$checkImage=TRUE;
		$this->_data['titlePage']="Trang Thêm Sản Phẩm";
		$this->_data['loadPage']="product/add_product";

		$this->load->helper('form');
		$this->load->library("form_validation");
		if($this->input->post("ok")){
			$this->form_validation->set_rules("txttensp"," Tên sản Phẩm","required");
			$this->form_validation->set_rules("txtgia"," Giá sản Phẩm","required|numeric");
			$this->form_validation->set_rules("txtsoluong"," Số lượng","numeric");
			$this->form_validation->set_rules("cate"," Loại sản phẩm","required");

			$this->form_validation->set_message("required","%s không được bỏ trống");
			$this->form_validation->set_message("numeric","%s phải là số,không chứa kí tự chữ");
			$this->form_validation->set_error_delimiters('<label class="control-label text-red" for="inputError"><i class="fa fa-times-circle-o"></i>', '</label>');
			if($this->form_validation->run()==TRUE){
				$now = getdate();
				$currentTime = $now["mday"] . "-" . $now["mon"] . "-" . $now["year"];
				$dataInsert=array(
					"name"=>$this->input->post("txttensp"),
					"code"=>$this->input->post("txtmasp"),
					"price"=>$this->input->post("txtgia"),
					"sale"=>$this->input->post("txtgiamgia"),
					"category"=>$this->input->post("cate"),
					"made_in"=>$this->input->post("txtxuatxu"),
					"qty"=>$this->input->post("txtsoluong"),
					"info"=>$this->input->post("txtnoidung"),
					"view"=>1,
					"buys"=>1,
					"date"=>date('Y-m-d'),
					"keyword" =>$this->input->post("txttukhoaseo"),
					);
				if($_FILES['img']['name'] != "")
				{
					$config['upload_path'] = './uploads/images/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '2000';
					$config['max_width']  = '5000';
					$config['max_height']  = '5000';
					$this->load->library('upload', $config);
					if($this->upload->do_upload("img"))				{
						$image= $this->upload->data();
						$dataInsert['image']=$image['file_name'];
					}else{
						$checkImage=false;
						$this->_data['error']=$this->upload->display_errors();
					}
				}

				if($checkImage==TRUE){
					$this->Mproduct->inserProduct($dataInsert);
					$this->session->set_flashdata('flash_mess', 'Thêm Sản Phẩm Thành Công!!');
					redirect(base_url()."admin/product/index");
				}
			}
		}
		$this->load->model("Mcategorie");
		$this->_data['cate']=$this->Mcategorie->listAllCate();
		$this->load->helper("menu");
		$this->load->view($this->_data["path"],$this->_data);
	}

	public function edit($id){
		$checkImage=TRUE;
		$this->_data['titlePage']="Chỉnh sửa sản phẩm";
		$this->_data['loadPage']="product/edit_product";
		$this->load->library("form_validation");
		$this->load->helper('form');
		$this->load->helper('menu');
		$this->_data['product']=$this->Mproduct->getProductById($id);
		if($this->input->post("ok"))
		{
			$this->form_validation->set_rules("txttensp"," Tên sản Phẩm","required");
			$this->form_validation->set_rules("txtgia"," Giá sản Phẩm","required|numeric");
			$this->form_validation->set_rules("txtsoluong"," Số lượng","numeric");
			$this->form_validation->set_rules("cate"," Loại sản phẩm","required");

			$this->form_validation->set_message("required","%s không được bỏ trống");
			$this->form_validation->set_message("numeric","%s phải là số,không chứa kí tự chữ");
			$this->form_validation->set_error_delimiters('<label class="control-label text-red" for="inputError"><i class="fa fa-times-circle-o"></i>', '</label>');
			if($this->form_validation->run()==TRUE){
				$dataUpdate=array(
					"name"=>$this->input->post("txttensp"),
					"code"=>$this->input->post("txtmasp"),
					"price"=>$this->input->post("txtgia"),
					"sale"=>$this->input->post("txtgiamgia"),
					"category"=>$this->input->post("cate"),
					"made_in"=>$this->input->post("txtxuatxu"),
					"qty"=>$this->input->post("txtsoluong"),
					"info"=>$this->input->post("txtnoidung"),
					"date"=>date('Y-m-d'),
					"keyword" =>$this->input->post("txttukhoaseo"),
				);
				if($_FILES['img']['name'] != ""){
					$config['upload_path'] = './uploads/images/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '2000';
					$config['max_width']  = '5000';
					$config['max_height']  = '5000';
					$this->load->library('upload', $config);
					if($this->upload->do_upload("img"))	{
						$image= $this->upload->data();
						$dataUpdate['image']=$image['file_name'];
						$oldimg = $this->input->post("oldimg");
                        unlink('./uploads/images/'.$oldimg);
					}else{
						$checkImage=false;
						$this->_data['error']=$this->upload->display_errors();
					}
				}
				if($checkImage==TRUE){
					$this->Mproduct->updateProdcut($dataUpdate,$id);
					$this->session->set_flashdata('flash_mess', 'Update Sản Phẩm Thành Công');
					redirect(base_url()."admin/product");
				}

			}
		}
		$this->load->model("Mcategorie");
		$this->_data['menu']=$this->Mcategorie->listAllCate();
		$this->load->view($this->_data['path'],$this->_data);
	}


	public function del($id) {
		$this->_data['product']=$this->Mproduct->getProductById($id);
		$oldimg = $this->_data['product']['image'];
		if ($this->input->get('type') == 'multi') {
			if (count($_POST['cid']) > 0) {
				foreach ($_POST['cid'] as $id_list) {
					$this->_data['product']=$this->Mproduct->getProductById($id_list);
					$oldimg_list = $this->_data['product']['image'];
					$this->Mproduct->deleteProduct($id_list,$oldimg_list);
				}
			}
		} else {
			$this->Mproduct->deleteProduct($id,$oldimg);
		}
		$this->session->set_flashdata("flash_mess", "Delete Thành Công");
		redirect(base_url() . "admin/product/index");
	}
	public function index2(){
        $this->_data['titlePage']="Danh sách sản phẩm";
        $this->_data['loadPage']="product/index_product2";

        $this->load->view($this->_data['path'],$this->_data);
    }

    public function ajax_list_sanpham(){
        $list = $this->Mproduct->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $this->load->model("Mcategorie");
        foreach ($list as $product) {
        	$cate = $this->Mcategorie->getCateById($product->category);
            $no++;
            $row = array();
            $row[] = $product->name;
            $row[] = $cate['cate_title'] ." - ". $cate['cate_id'] ;
            $row[] = $product->price;
            $row[] = $product->date;
            $row[] = "<img src='".base_url()."uploads/images/".$product->image."' width='100px' class='imgs' />";
            $row[] = '<a class="btn btn-sm btn-primary" href="edit/'.$product->id.'" title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="del/'.$product->id.'" title="Hapus"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Mproduct->count_all(),
            "recordsFiltered" => $this->Mproduct->count_filtered(),
            "data" => $data,
            );
        echo json_encode($output);
    }
}
