<?php 

class Configs extends MX_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {

		$value = array(
			'show_top_header' => true, //If true se hien thi, nguoc lai hide
			'block_left'	=> true, // If true thi phan ben trai se hien thi, nguoc lai hide
			'block_right'	=> true, // If true thi phan ben fai hien thi, nguoc lai hide
			'show_datetime' => true,
			'email_support' => '', // If no la rong thi se ko hien thi, nguoc lai 
			'phone'	=> '', // If no la rong thi se ko hien thi, nguoc lai 
			'facebook' => '',
			'youtube' => '',
			'show_reg_link' => true,
			'show_login_link' => true

		);

		$data = array (
			'group'	=> 'top_header',
			'value'	=> serialize($value)
		);		

		$this->db->insert('config', $data);
	}

	public function get_my_config()
	{
		$configs = $this->db->get_where('config', array('group' => 'top_header'))->row();

		$value = unserialize($configs->value);

		echo "<pre>";
		print_r($value);
		echo "</pre>";
	}

}

