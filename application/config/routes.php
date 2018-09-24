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
$route['404_override'] = '404';
$route['translate_uri_dashes'] = FALSE;
$route['about-us'] ='home/about_us';
$route['global-presence'] ='home/global_presence';
$route['global-location'] ='home/global_location';
$route['contact-us'] ='home/contact_us';
$route['map-view'] ='home/contact_us_mapview';
$route['contact-location'] ='home/contact_location';


$route['feedback'] ='home/feedback';
$route['send-feedback'] ='home/sendFeedback';
$route['feedback/success'] ='home/feedback';

$route['search'] ='home/search';

$route['careers'] ='Careers';
$route['careers/(:num)/[a-z 0-9 -]+'] = 'Careers/job_apply_now';
$route['careers/send/(:num)/[a-z 0-9 -]+'] = 'Careers/submit_apply';
$route['careers/success'] ='Careers/showSuccessPage';


$route['all-products'] = 'All_Products';
$route['all-products/(.+)'] = 'All_Products/page/$1';
$route['products/[a-z 0-9 -]+'] = 'products/page/$1';
$route['products/[a-z 0-9 -]+/page/(:num)'] = 'products/page/$1';
$route['products/[a-z 0-9 -]+/page'] = 'products/page/$1';
$route['products/[a-z 0-9 -]+/[a-z 0-9 -]+-(:num)'] = 'products/product_detail_page';


$route['all-applications'] = 'All_Applications';
$route['all-applications/(.+)'] = 'All_Applications/page/$1';
$route['applications/[a-z 0-9 -]+'] = 'applications/page/$1';
$route['applications/[a-z 0-9 -]+/page/(:num)'] = 'applications/page/$1';
$route['applications/[a-z 0-9 -]+/page'] = 'applications/page/$1';
$route['applications/[a-z 0-9 -]+/[a-z 0-9 -]+-(:num)'] = 'applications/application_detail_page';

$route['gallery'] ='home/gallery';

$route['latest-news'] ='News';
$route['latest-news/[a-z 0-9 -]+'] ='News/news_detail_page';

$route['compare-products'] ='products/products_compare';

$route['vision-mission'] ='home/vision';

$route['frequently-ask-questions'] ='home/faq_page';

$route['mepco-speciality-products'] ='home/speciality_products';

$route['awards-certifications'] ='home/awards_page';

$route['capexils-export-merit-award-2014-15'] ='home/award_one';
$route['ISO-9001-2008-Award'] ='home/award_two';
$route['capexils-export-merit-award-2009-10'] ='home/award_three';

$route['capexils-export-merit-award-2001-02'] ='home/award_four';

$route['share-holders'] ='home/share_holder_page';














