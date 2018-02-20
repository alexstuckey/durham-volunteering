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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['onboard/welcome'] = 'onboarding/welcome';
$route['onboard/steps_details'] = 'onboarding/flow';
$route['onboard/enter_details'] = 'onboarding/enter_details_form';
$route['onboard/send_details'] = 'onboarding/send_details';
$route['onboard/enter_nominate_manager'] = 'onboarding/enter_nominate_manager_form';
$route['onboard/send_nominate_manager'] = 'onboarding/send_nominate_manager';

$route['home'] = 'home/homepage';
$route['my_volunteering'] = 'home/my_volunteering';
$route['my_volunteering/activities'] = 'home/my_volunteering_activities';
$route['manager'] = 'home/manager_approve_deny';
$route['other'] = 'home/other_section';

$route['admin/departments'] = 'admin/departments';
$route['admin/notification'] = 'admin/notification';
$route['admin/emails'] = 'admin/emails';
$route['admin/settings'] = 'admin/settings';
$route['admin/edit_email'] = 'admin/edit_email';

$route['causes']['GET'] = 'causes/listAll';
$route['causes']['POST'] = 'causes/create';

$route['cause/(:num)']['GET'] = 'causes/get/';


$route['times']['GET'] = 'times/list';
$route['times']['POST'] = 'times/create';

$route['time/(:num)']['GET'] = 'times/get';

$route['user/(:any)'] = 'user/get';
