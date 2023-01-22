<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
/* $route['URL'] = 'Controller filename or classname/Controller function' */
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
/* userdef */
$route['users'] = 'main/users';
$route['users/new'] = 'main/new';
$route['users/create'] = 'main/users';
$route['users/create/(:any)'] = 'main/create/$1';
$route['users/count'] = 'main/count';
$route['users/reset'] = 'main/reset';
$route['users/say/(:any)/(:any)'] = 'main/say/$1/$2';
$route['users/mprep'] = 'main/mprep';
/*Feedback Form*/
$route['feedback_form'] = 'feedbackctrler/feedback';
$route['feedback_form/result'] = 'feedbackctrler/result';
/* Raffle Draw */
$route['raffle_draw'] = 'taskCtrler/raffle_draw';
/* Money Button game */
$route['moneybuttongame'] = 'taskCtrler/moneybuttongame';
/* Bookmark */
$route['bookmarks'] = 'taskCtrler/viewbookmarks';
$route['bookmarks/add'] = 'taskCtrler/add_bookmarks';
$route['bookmarks/delete'] = 'taskCtrler/delete_bookmarks';
$route['bookmarks/confirm_delete'] = 'taskCtrler/confirm_delete';
/* Phonebook */
$route['phonebook'] = 'taskCtrler/phonebook';
$route['phonebook/choice'] = 'taskCtrler/pb_choice';
/* Phonebook Action */
$route['phonebook/edit'] = 'taskCtrler/pb_edit';
$route['phonebook/add'] = 'taskCtrler/pb_add';
$route['phonebook/delete'] = 'taskCtrler/pb_del';
/* Authentication II */
$route['authentication'] = 'taskCtrler/authentications';
$route['register'] = 'taskCtrler/authentications';
$route['log-in'] = 'taskCtrler/login';
$route['log-out'] = 'taskCtrler/logout';
/* Shopping Spree */
$route['shop'] = 'act_controllers/view_shop';
$route['mycart'] = 'act_controllers/view_cart';
$route['buy'] = 'act_controllers/buy_item';
$route['mycart/del'] = 'act_controllers/del_item_oncart';
/* Exam Products */
$route['products'] = 'act_controllers/products';
$route['products/view_all'] = 'act_controllers/view_product';
/* $route['spec'] = 'act_controllers/view_product_spec1';
$route['products/(:any)'] = 'act_controllers/view_product_spec/$1'; */
/* Product 2 */
/* $route['search'] = 'act_controllers/search_products';
$route['result'] = 'act_controllers/view_search_products'; */
/* Product 3 with ajax */
$route['search/byname/(:any)'] = 'act_controllers/search_products_name/$1';
$route['search/bycategory/(:any)'] = 'act_controllers/search_products_category/$1';
$route['result'] = 'act_controllers/view_search_products';
/* Ajax */
/* Order Taker */
$route['order'] = 'ajax_controllers/view_orderpage';
$route['order/partial'] = 'ajax_controllers/view_orderform';
$route['order/take_order'] = 'ajax_controllers/take_order';
/* Sql Attack */
$route['sql-injection'] = 'act_controllers/open_sql_attack';
$route['sql-submit'] = 'act_controllers/attack_sql';
/* Client Billing */
$route['client-billing'] = 'act_controllers/view_client_billing';
/* Sports */
$route['sport-players'] = 'act_controllers2/view_players';
$route['search-players'] = 'act_controllers2/search_players';
