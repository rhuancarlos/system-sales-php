<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/


$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



$route['Login/Autentica'] 	= 	'Login/verificalogin';
$route['Home'] 				= 	'Home';


$route['Usuarios'] 			= 	'Usuario/viewlistUser';
$route['Clientes'] 			= 	'Cliente/viewlistClient';
$route['Produtos'] 			= 	'Produto/viewlistProdut';
