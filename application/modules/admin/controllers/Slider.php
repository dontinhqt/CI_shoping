<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Slider extends AdminController {
	public function __construct(){
		parent::__construct();
		$this->_data['mess']="";

	}

	public function index(){
		$this->_data['titlePage'] = "Quản lý slider";
		$this->_data['loadPage'] ="slider/index_slider";
		$this->load->model("Mslider");
		$this->_data['slider'] = $this->Mslider->listAllSlider();

		$this->_data['mess'] = $this->session->flashdata("flash_mess");
		$this->load->view($this->_data['path'],$this->_data);
	}

	public function addslider(){
		$status = "";
		$msg = "";
		$file_element_name = 'userfile';
		if (empty($_POST['txtinfo'])) {
			$status = "error";
			$msg = "Vui lòng nhập thông tin";
		}
		if (empty($_POST['txtkeyword'])) {
			$status = "error";
			$msg = "Vui lòng nhập từ khóa";
		}
		if ($_FILES['userfile']["name"] == "") {
			$status = "error";
			$msg = "Vui lòng chọn ảnh";
		}

		if ($status != "error"){
			$config['upload_path'] = './uploads/images/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = 1024 * 8;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload($file_element_name)){
				$status = 'error';
				$msg = $this->upload->display_errors('', '');
			}
			else{
				$data = $this->upload->data();
				$dataInsert = array(
							"name"=>"slider",
							"image"=>$data['file_name'],
							"keyword"=>$_POST['txtkeyword'],
							"info"=>$_POST['txtinfo']

					);
				$this->load->model("Mslider");
				$file_id = $this->Mslider->insertSlider($dataInsert);
		 		if($file_id){
		 			$status = "success";
		 			// $msg = "Thành công";
		 			$this->session->set_flashdata('flash_mess', 'Thêm Slider thành công!');
		 		}
		 		else{
		 			unlink($data['full_path']);
		 			$status = "error";
		 			$msg = "Bị lổi, thử lại.";
		 		}
			}
		 	@unlink($_FILES[$file_element_name]);
		}

		echo json_encode(array('status' => $status, 'msg' => $msg));
	}

	public function reload(){
        $this->load->model("Mslider");
		$this->_data['slider'] = $this->Mslider->listAllSlider();

        $this->_data['mess'] = $this->session->flashdata("flash_mess");
        $this->load->view("slider/reload_slider",$this->_data);

    }

    public function del($id){
    	// $id  tự lấy lấy từ url, tương ứng $this->uri->segment(4);
    	$this->load->model("Mslider");
    	$image = $this->Mslider->getSliderById($id);
    	$check = $this->Mslider->delSlider($id);
    	if($check === true){
    		unlink('./uploads/images/'.$image['image']);
    	}
    	$this->session->set_flashdata('flash_mess', 'Xoá Slider thành công');
    	redirect(base_url().'admin/slider/index');
    }

    public function edit($id) {
    	// $id  tự lấy lấy từ url, tương ứng $this->uri->segment(4);
		$checkImage=TRUE;
		$this->_data['titlePage']="Chỉnh sửa Slider";
		$this->_data['loadPage']="slider/edit_slider";
		$this->load->library("form_validation");
		$this->load->model("Mslider");
		$this->_data['slider']=$this->Mslider->getSliderById($id);

		if($this->input->post("ok")){
			$this->form_validation->set_rules("txtinfo","Mô tả","required|min_length[20]");
			if($this->form_validation->run()==TRUE){
				$dataUpdate = array(
					"keyword"=>$this->input->post("txtkeyword"),
					"info"	=>$this->input->post("txtinfo"),
					);
				if($_FILES['userfile']['name'] != ""){
					$config['upload_path'] = './uploads/images/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']  = 1024 * 8;
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					if($this->upload->do_upload("userfile")){
						$image= $this->upload->data();
						$dataUpdate['image']=$image['file_name'];
						$oldimg = $this->input->post("oldimg");
                        unlink('./uploads/images/'.$oldimg);
					}else{
						$checkImage=false;
						$this->_data['mess']=$this->upload->display_errors();
					}
				}
				if($checkImage==TRUE){
					$this->load->model("Mslider");
					$this->Mslider->updateSlider($dataUpdate,$id);
					$this->session->set_flashdata('flash_mess', 'Cập nhật Slider thành công !');
					redirect(base_url()."admin/slider/index");
				}

			}
		}

		$this->load->view($this->_data['path'],$this->_data);
	}

}
