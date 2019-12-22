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
$route['default_controller'] = 'home';

//Login
$route['recovery'] = 'login/recovery';

//Register
$route['registerEducation'] = 'register/education';
$route['educationMembership'] = 'register/educationMembership';
$route['registerTutor'] = 'register/tutor';
$route['tutorMembership'] = 'register/tutorMembership';
$route['registerStudent'] = 'register/student';

//Membership
//--- For Register ---//
$route['payEMR'] = 'membership/payCenterForReg';
$route['purchaseEMR'] = 'membership/purCenterForReg';
$route['cancelEMR'] = 'membership/cancelCenterForReg';          //cancel url
$route['payTMR/(:any)'] = 'membership/payTutorForReg/$1';
$route['purchaseTMR/(:any)'] = 'membership/purTutorForReg/$1';
$route['cancelTMR'] = 'membership/cancelTutorForReg';           //cancel url
//--- For Update ---//
$route['payEMU'] = 'membership/payCenterForUpdate';
$route['cancelEMU'] = 'membership/cancelCenterForUpdate';          //cancel url
$route['purchaseEMU'] = 'membership/purCenterForUpdate';
$route['payTMU/(:any)'] = 'membership/payTutorForUpdate/$1';
$route['purchaseTMU/(:any)'] = 'membership/purTutorForUpdate/$1';
$route['cancelTMU'] = 'membership/cancelTutorForUpdate';           //cancel url


//Home
$route['profile'] = 'home/profile';
$route['membership'] = 'home/membership';
$route['faqEducation'] = 'home/faqEducation';
$route['faqTutor'] = 'home/faqTutor';
$route['faqStudent'] = 'home/faqStudent';
$route['aboutUs'] = 'home/aboutUs';
$route['contactUs'] = 'home/contactUs';
$route['terms'] = 'home/terms';
$route['howToWork'] = 'home/howToWork';
$route['privatePolicy'] = 'home/privatePolicy';
$route['personalInfoCollection'] = 'home/personalInfoCollection';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
