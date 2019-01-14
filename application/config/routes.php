<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'pages/common';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['pages'] = 'pages/common';
$route['home'] = 'pages/common';
$route['saai'] = 'pages/common/saai';
$route['about'] = 'pages/common/about';
$route['gallery'] = 'pages/common/gallery';
$route['contacts'] = 'pages/common/contact';
$route['admin/add_users'] = 'admin/users/add_primary_users/';

//Route url for admin
$route['admin'] = 'admin/login/index_login';
$route['users/adminusers'] = 'users/adminusers';
$route['users/add_adminusers'] = 'users/add_adminusers';
$route['users/edit_adminusers'] = 'users/edit_adminusers';
$route['adminindex/endusers'] = 'adminindex/endusers';
//$route['users/add_endusers'] = 'users/add_endusers';

$route['adminindex/edit_endusers'] = 'adminindex/edit_endusers';

$route['admin/logout'] = 'admin/login/logout';
$route['admin/dashboard'] = 'admin/adminindex/dashboard';
$route['admin/delete'] = 'admin/adminindex/delete';
$route['adminindex/category'] = 'adminindex/category';
$route['adminindex/add_category'] = 'adminindex/add_category';
$route['adminindex/edit_category/(:any)'] = 'adminindex/edit_category';

$route['adminindex/subcategory'] = 'adminindex/subcategory';
$route['adminindex/add_subcategory'] = 'adminindex/add_subcategory';
$route['adminindex/edit_subcategory/(:any)'] = 'adminindex/edit_subcategory';
$route['adminindex/recipient'] = 'adminindex/recipient';
$route['adminindex/add_recipient'] = 'adminindex/add_recipient';
$route['adminindex/edit_recipient'] = 'adminindex/edit_recipient';
$route['adminindex/giftproduct'] = 'adminindex/giftproduct';
$route['adminindex/add_giftproduct'] = 'adminindex/add_giftproduct';
$route['adminindex/edit_giftproduct'] = 'adminindex/edit_giftproduct';
$route['adminindex/product_attributes'] = 'adminindex/product_attributes';
$route['adminindex/add_product_attributes'] = 'adminindex/add_product_attributes';
$route['adminindex/edit_product_attributes/(:any)'] = 'adminindex/edit_product_attributes';
$route['adminindex/loadcategory_reference'] = 'adminindex/loadcategory_reference';
$route['adminindex/product_attribute_sets'] = 'adminindex/product_attribute_sets';
$route['track_order'] = 'index/track_order';
// $route['adminindex/delete/(:any)/(:any)'] = 'adminindex/delete';




$route['adminindex/area'] = 'adminindex/area';
$route['adminindex/add_area'] = 'adminindex/add_area';
$route['adminindex/edit_area'] = 'adminindex/edit_area';
$route['adminindex/city'] = 'adminindex/city';
$route['adminindex/add_city'] = 'adminindex/add_city';
$route['adminindex/edit_city'] = 'adminindex/edit_city';

$route['adminindex/state'] = 'adminindex/state';
$route['adminindex/add_state'] = 'adminindex/add_state';
$route['adminindex/edit_state'] = 'adminindex/edit_state';

$route['adminindex/order'] = 'adminindex/order';
$route['adminindex/edit_order'] = 'adminindex/edit_order';
$route['adminindex/orderitem'] = 'adminindex/orderitem';
$route['adminindex/edit_orderitem'] = 'adminindex/edit_orderitem';
$route['adminindex/trackorder'] = 'adminindex/trackorder';
$route['adminindex/edit_trackorder'] = 'adminindex/edit_trackorder';
$route['adminindex/edit_transaction'] = 'adminindex/edit_transaction';
// $route['adminindex/admin_404'] = 'admin/adminindex/admin_nopage';
$route['admin/admin_404'] = 'admin/adminindex/admin_nopage';

