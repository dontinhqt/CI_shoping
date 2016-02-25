<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('navigations')){
	function navigations(){
		$CI =& get_instance();
		$CI->db->select('*');
		$CI->db->from('category');
		$CI->db->where('level', 1);
		$result = $CI->db->get()->result_array();
		if(isset($result) && is_array($result) && count($result) ){
			foreach($result as $key => $val){
				$result[$key]['items'] = item(array('lft' => $val['lft'],'rgt' => $val['rgt']));
			}
		}
		return $result;
	}
}

if(!function_exists('item')){
	function item($param = NULL){
		$CI =& get_instance();
		$lft = ((isset($param['lft']) && $param['lft'] >0) ? $param['lft'] : '');
		$rgt = ((isset($param['rgt']) && $param['rgt'] >0) ? $param['rgt'] : '');
		$CI->db->select('*');
		$CI->db->from('category');
		$CI->db->where(array(
			'lft >' => $lft,
			'rgt <' => $rgt,
			'level' => 2,
		));
		$result = $CI->db->get()->result_array();
		$CI->db->flush_cache();
		if(isset($result) && is_array($result) && count($result)){
			foreach($result as $key => $val){
				
				$result[$key]['subitems'] = subitem(array('lft' => $val['lft'],'rgt' => $val['rgt']));
			}
		}
		return $result;
		
	}
}

if(!function_exists('subitem')){
	function subitem($param = NULL){
		$CI =& get_instance();
		$lft = ((isset($param['lft']) && $param['lft'] >0) ? $param['lft'] : '');
		$rgt = ((isset($param['rgt']) && $param['rgt'] >0) ? $param['rgt'] : '');
		$CI->db->select('*');
		$CI->db->from('category');
		$CI->db->where(array(
			'lft >' => $lft,
			'rgt <' => $rgt,
			'level' => 3,
		));
		$result = $CI->db->get()->result_array();
		$CI->db->flush_cache();
		return $result;
		
	}
}
