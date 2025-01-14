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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['Login'] = 'Auth/login';
$route['Register'] = 'Auth/register';
$route['Logout'] = 'Auth/logout';

$route['Insert_Kategori'] = 'SettingCatNot/add_new_index';
$route['Insert_Notification'] = 'SettingCatNot/add_Notification';

$route['Dashboard'] = 'dashboard';

$route ['add-income'] = 'Transactions/add_income';
$route ['add-expense'] = 'Transactions/add_expense';

$route ['view-transactions'] = 'Transactions/index';

$route ['Category'] = 'Categories/index';
$route ['add-category'] = 'Categories/add';
$route ['edit-category/(:num)'] = 'Categories/edit/$1';
$route ['delete-category/(:num)'] = 'Categories/delete/$1';

$route ['report'] = 'Reports/index';
$route ['report-by-category'] = 'Reports/by_category';
$route ['report-by-month'] = 'Reports/by_month';
$route ['report-by-year'] = 'Reports/by_year';
