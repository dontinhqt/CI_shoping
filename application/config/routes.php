<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'default/index/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin']="admin/logo/index";
$route['san-pham/(:num)-(:any)']="default/sanpham/chitiet/$1";

$route['gio-hang']="default/sanpham/giohang";
$route['gio-hang/(:num)-(:any)']="default/sanpham/giohang";

$route['thanh-toan']="default/sanpham/thanhtoan";
$route['thanh-toan-thanh-cong']="default/sanpham/save_order";

$route['tat-ca-san-pham']="default/sanpham/allproduct";
$route['loai-san-pham/(:num)-(:any)']="default/sanpham/GetproductByCategory/$1";