<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin/(:any)'] = 'adminpage/view/$1';
$route['admin'] = 'adminpage/view';
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
