<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Place extends AdminController {
	public function __construct(){
		parent::__construct();
		@session_start();
		$_SESSION['KCFINDER']['disabled']=false;
		$_SESSION['KCFINDER']['uploadURL']=base_url()."uploads/images";
	}

	public function index(){
		$this->_data['titlePage']="Quản lí liên hệ";
        $this->_data['loadPage']="place/index_place";
        $this->load->model("Mplace");
        $this->_data['place']=$this->Mplace->ListAllPlace();

        $this->_data['mess'] = $this->session->flashdata("flash_mess");
		$this->load->view($this->_data['path'],$this->_data);
	}

	public function addplace(){
		$this->_data['titlePage'] = 'Thêm mới liên hệ';
		$this->_data['loadPage'] = 'place/add_place';

		if($this->input->post("ok")){
			$dataInsert=array(
				"name"=>$this->input->post("txtname"),
				"adress"=>$this->input->post("txtadress"),
				"map"=>$this->input->post("txtmap"),
			);
		$this->load->model("Mplace");
		$this->Mplace->insertPlace($dataInsert);
		$this->session->set_flashdata('flash_mess', 'Thêm Thành Công!!');
		redirect(base_url()."admin/place");
		}
		$this->load->view($this->_data["path"],$this->_data);
	}

	public function edit($id) {
		$this->_data['titlePage'] = 'Chỉnh sửa liên hệ';
		$this->_data['loadPage'] = 'place/edit_place';
		$this->load->model("Mplace");
		$this->_data['place']=$this->Mplace->getPlacebyId($id);
		if($this->input->post("ok"))
		{
			$dataUpdate=array(
				"name"=>$this->input->post("txtname"),
				"adress"=>$this->input->post("txtadress"),
				"map"=>$this->input->post("txtmap"),
				);
			$this->Mplace->updatePlace($dataUpdate,$id);
			$this->session->set_flashdata('flash_mess', 'Update liên hệ thành công');
			redirect(base_url()."admin/place");
		}
		$this->load->view($this->_data['path'],$this->_data);
	}
	public function del($id){
		$this->load->model("Mplace");
		$this->Mplace->deletePlace($id);
		$this->session->set_flashdata("flash_mess","Xóa Thành Công");
		redirect(base_url()."admin/place/index");


	}

}
