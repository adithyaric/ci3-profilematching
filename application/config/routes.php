<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']    = 'auth';
// $route['default_controller']    = 'home';
$route['alternatif']            = 'admin/alternatif';
$route['user']                  = 'admin/user';
$route['kriteria']              = 'admin/kriteria';
$route['bobotkriteria']         = 'admin/bobotkriteria';
$route['nilai']                 = 'admin/nilai';
$route['perhitungan']           = 'admin/perhitungan';
$route['riwayat']               = 'admin/riwayat';
$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;
