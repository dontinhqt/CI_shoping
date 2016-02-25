<?php
class Autocomplete extends MainController
{
	public function __construct() {
        parent::__construct();
        $this->load->model('mautocomplete');
    }
	// public function index(){
	//         $this->load->view('view_demo');
	// }
    public function check_in_client() {
    $this->load->library('javascript');
    $this->load->view('view_demo');
    if(isset($_GET['term'])) {
        $result= $this->membership_model->check_in_client($_GET['term']);

    }
}
}