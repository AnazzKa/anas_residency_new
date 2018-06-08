<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['default_controller'] = "Login";
$route['do_login'] = "Login/process";
$route['do_logout'] = "Login/do_logout";
$route['dashboard'] = 'Dashboard';
$route['users'] = 'Users/index';
$route['users_view'] = 'Users/view';
$route['previlage'] = 'Users/previlage';
$route['menus'] = 'Users/menus';
$route['applications_view'] = 'Applications/applications_view';
$route['get_all_applications'] = 'Applications/get_all_applications';
$route['profile'] = 'Applications/profile';
$route['completed_applications'] = 'Applications/completed_applications';
$route['change_status'] = 'Applications/change_status';
$route['add_comment'] = 'Applications/add_comment';
$route['dowlaod_zip'] = 'Applications/zip_download';
$route['application_excel'] = 'Applications/application_excel';
$route['status_change_applications'] = 'Applications/status_change_applications';
$route['404_override'] = '';
