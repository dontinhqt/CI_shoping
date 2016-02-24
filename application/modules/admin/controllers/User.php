<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User extends AdminController {
    public function __construct(){
            parent::__construct();
            $this->load->model('Muser');
    }

    public function index(){
        $this->_data['titlePage']="Danh sách user";
        $this->_data['loadPage']="user/index_view";
        $this->load->helper('url');

        $this->load->view($this->_data['path'],$this->_data);
    }

    public function ajax_list(){
        $list = $this->Muser->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = $user->user;
            $row[] = $user->email;
            $row[] = $user->phone;
            $row[] = $user->address;
            if($user->level == 1){
                $row[] ="<p class='text-primary'>Administrator</p>";
            }else{
                $row[] = "Member";
            }
            // $row[] = $user->level;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_person('."'".$user->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_person('."'".$user->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Muser->count_all(),
            "recordsFiltered" => $this->Muser->count_filtered(),
            "data" => $data,
            );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_add(){
        $this->_validate();
        $data = array(
                'user' => $this->input->post('txtuser'),
                'email' => $this->input->post('txtemail'),
                'pass' => md5($this->input->post('txtpass')),
                'phone' => $this->input->post('txtphone'),
                'address' => $this->input->post('txtaddress'),
                'level' => $this->input->post('txtlevel'),
            );
        $insert = $this->Muser->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_edit($id)
    {
        $data = $this->Muser->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_update()
    {
        $this->_validate();
        $this->_validate_update();
        $data = array(
                'user' => $this->input->post('txtuser'),
                'email' => $this->input->post('txtemail'),
                'phone' => $this->input->post('txtphone'),
                'address' => $this->input->post('txtaddress'),
                'level' => $this->input->post('txtlevel'),
            );
        if($this->input->post("txtpass")){
                $data['pass']=md5($this->input->post('txtpass'));
            }
        $this->Muser->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->Muser->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('txtuser') == '')
        {
            $data['inputerror'][] = 'txtuser';
            $data['error_string'][] = 'User không được để trống';
            $data['status'] = FALSE;
        }

        if($this->input->post('txtemail') == '')
        {
            $data['inputerror'][] = 'txtemail';
            $data['error_string'][] = 'Email không được để trống';
            $data['status'] = FALSE;
        }

        if(!empty($this->input->post('action')) && $this->input->post('action') == 'add'){
            if($this->input->post('txtpass') == '')
            {
                $data['inputerror'][] = 'txtpass';
                $data['error_string'][] = 'Password không được để trống';
                $data['status'] = FALSE;
            }

            if($this->input->post('txtrepass') != $this->input->post('txtpass'))
            {
                $data['inputerror'][] = 'txtrepass';
                $data['error_string'][] = 'Password không giống nhau';
                $data['status'] = FALSE;
            }
        }

        if($this->input->post('txtphone') == '')
        {
            $data['inputerror'][] = 'txtphone';
            $data['error_string'][] = 'Số điện thoại không được để trống';
            $data['status'] = FALSE;
        }

        if($this->input->post('txtlevel') == '')
        {
            $data['inputerror'][] = 'txtlevel';
            $data['error_string'][] = 'Vui lòng chọn level';
            $data['status'] = FALSE;
        }

        if($this->input->post('txtaddress') == '')
        {
            $data['inputerror'][] = 'txtaddress';
            $data['error_string'][] = 'Địa chỉ không được để trống';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    private function _validate_update(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
        if($this->input->post('txtrepass') != $this->input->post('txtpass'))
        {
            $data['inputerror'][] = 'txtrepass';
            $data['error_string'][] = 'Password không giống nhau';
            $data['status'] = FALSE;
        }
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
}
