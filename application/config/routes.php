<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['(:any)'] = 'admin/admin/data_barang';
$route['kategori/pakaian-anak-anak(:any)'] = 'kategori/pakaian_anak_anak';
$route['kategori/pakaian-wanita(:any)'] = 'kategori/pakaian_wanita';
$route['kategori/pakaian-pria(:any)'] = 'kategori/pakaian_pria';
$route['kategori/aksesoris-and-komputer(:any)'] = 'kategori/aksesoris_and_komputer';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;
