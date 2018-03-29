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
$route['onboard/steps_details'] = 'onboarding/step_details';
$route['onboard/enter_details'] = 'onboarding/enter_details_form';
$route['onboard/send_details'] = 'onboarding/send_details';
$route['onboard/enter_nominate_manager'] = 'onboarding/enter_nominate_manager_form';
$route['onboard/send_nominate_manager'] = 'onboarding/send_nominate_manager';
$route['onboard/wait_nominate_manager'] = 'onboarding/wait_nominate_manager';

$route['home'] = 'home/homepage';
$route['home/causes'] = 'home/single_cause';
$route['my_volunteering'] = 'home/my_volunteering';
$route['my_volunteering/activities'] = 'home/my_volunteering_activities';
$route['manager'] = 'home/manager_approve_deny';
$route['statistics'] = 'home/statistics';

$route['admin/departments'] = 'admin/departments';
$route['admin/departments/add']['POST'] = 'admin/departmentAdd';
$route['admin/departments/edit']['POST'] = 'admin/departmentEdit';
$route['admin/notification'] = 'admin/notification';
$route['admin/emails'] = 'admin/emails';
$route['admin/emails/edit']['POST'] = 'admin/emailsEdit';
$route['admin/declaration']['GET'] = 'admin/declaration';
$route['admin/declaration']['POST'] = 'admin/declarationEdit';
$route['admin/settings'] = 'admin/settings';
$route['admin/audit'] = 'admin/audit';

$route['cause/(:num)']['GET'] = 'causes/causeByID/$1';

$route['time/create']['POST'] = 'times/createFormSubmit';
$route['time/delete']['POST'] = 'times/deleteFormSubmit';
$route['time/manager_response']['POST'] = 'times/confirmDenyFormSubmit';

$route['statistics/sumTimeByCause']['GET'] = 'statistics_model/sumTimeByCause';


$route['api/causes']['GET'] = 'causes/listAll';
$route['api/causes']['POST'] = 'causes/create';
$route['api/cause/(:num)']['GET'] = 'causes/get/';
$route['api/times']['GET'] = 'times/list';
$route['api/times']['POST'] = 'times/create';
$route['api/time/(:num)']['GET'] = 'times/get';
$route['api/user/(:any)'] = 'user/get';
