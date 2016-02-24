<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Banner extends AdminController {
	public function __construct(){
		parent::__construct();
		$this->_data['mess']="";
	}

	public function index(){
		$this->_data['titlePage']="Quản lí Banner";
        $this->_data['loadPage']="banner/index_banner";
        $this->load->model("Mbanner");
        $this->_data['banner']=$this->Mbanner->listAllBanner();

        $this->_data['mess'] = $this->session->flashdata("flash_mess");
		$this->load->view($this->_data['path'],$this->_data);
	}

	public function addbanner(){
		$status = "";
		$msg = "";
		$file_element_name = 'userfile';
		if (empty($_POST['keyword'])) {
			$status = "error";
			$msg = "Vui lòng nhập từ khóa";
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
							"name"=>"banner",
							"image"=>$data['file_name'],
							"keyword"=>$_POST['keyword']

					);
				$this->load->model("Mbanner");
				$file_id = $this->Mbanner->insertBanner($dataInsert);
				if($file_id){
					$status = "success";
					// $msg = "Thành công";
					$this->session->set_flashdata('flash_mess', 'Thêm Banner thành công!');
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
        $this->load->model("Mbanner");
        $this->_data['banner']=$this->Mbanner->listAllBanner();

        $this->_data['mess'] = $this->session->flashdata("flash_mess");
        $this->load->view("banner/reload_banner",$this->_data);

    }

    public function del($id){
    	// $id  tự lấy lấy từ url, tương ứng $this->uri->segment(4);
    	$this->load->model("Mbanner");
    	$image = $this->Mbanner->getImage($id);
    	$check = $this->Mbanner->delbanner($id);
    	if($check === true){
    		unlink('./uploads/images/'.$image['image']);
    	}
    	$this->session->set_flashdata('flash_mess', 'Xoá Banner thành công');
    	redirect(base_url().'admin/banner/index');
    }

    public function edit($id) {
    	// $id  tự lấy lấy từ url, tương ứng $this->uri->segment(4);
		$checkImage=TRUE;
		$this->_data['titlePage']="Chỉnh sửa banner";
		$this->_data['loadPage']="banner/edit_banner";
		$this->load->library("form_validation");
		$this->load->model("Mbanner");
		$this->_data['banner']=$this->Mbanner->getImage($id);

		if($this->input->post("ok")){
			$this->form_validation->set_rules("txtkeyword","name","required");
			if($this->form_validation->run()==TRUE){
				$dataUpdate = array("keyword"=>$this->input->post("txtkeyword"));
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
					$this->load->model("Mbanner");
					$this->Mbanner->updateBanner($dataUpdate,$id);
					$this->session->set_flashdata('flash_mess', 'Cập nhật banner thành công !');
					redirect(base_url()."admin/banner/index");
				}

			}
		}

		$this->load->view($this->_data['path'],$this->_data);
	}

}
