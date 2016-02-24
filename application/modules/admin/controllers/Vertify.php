<?php
class Vertify extends AdminController{
    public function __construct(){
        parent::__construct();
        $this->load->model("Muser");
    }
    public function login(){
        $this->_data['mess']="";
        if($this->input->post("ok")){
            $u= $this->input->post("txtuser");
            $p= md5($this->input->post("txtpass"));
            $data=$this->Muser->checkLogin($u,$p);
            if($data==FALSE){
                $this->_data['mess']="Sai tài khoản hoặc mật khẩu";
            }else{
                $sess = array(
                    "user"=> $data['user'],
                    "id"=> $data['id'],
                    "level"=> $data['level'],
                    "address"=> $data['address']
                );
                $this->session->set_userdata($sess);
                $this->session->set_flashdata('flash_mess',"Đăng nhập thành công");
                redirect(base_url()."admin/user/index");
            }
        }
        $this->load->view('vertify/login_view',$this->_data);
    }

    public function logout(){
        $this->session->sess_destroy();
        session_start();
        session_destroy();
        redirect(base_url()."admin/verify/login");
    }

}
?>