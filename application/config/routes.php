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
$route['default_controller'] = 'HomeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//===============Auth=================//
$route['login'] = 'Auth/LoginController/showLoginForm';
$route['logout']['POST'] = 'Auth/LogoutController/logout';

//===============Shop=================//
$route['shop'] = 'Shop/ShopController';

$route['shop/(:any)'] = 'Shop/ShopController/index/$1';// $1 is category

//===============Product=================//
$route['product/(:num)'] = 'Product/ProductController/show/$1';


//===============Cart=====================//

$route['cart'] = 'Cart/CartController/show';
$route['add-to-cart'] = 'Cart/CartController/addToCart';
$route['cart/update'] = 'Cart/CartController/updateCart';


//================Check out ==============//

$route['cart/checkout'] = 'CheckOut/CheckoutController';
$route['place-order']['POST'] = 'CheckOut/CheckoutController/placeOrder';

//================User Profile ==============//
$route['profile'] = 'Profile/ProfileController';
$route['profile/my-orders'] = 'Profile/ProfileController/myOrders';
$route['profile/my-wishlist'] = 'Profile/ProfileController/myWishList';
$route['add-to-wishlist'] = 'WishList/WishListController/addToWishList';



/*
| -------------------------------------------------------------------------
|                                   ADMIN
| -------------------------------------------------------------------------
*/
$route['admin'] = 'Admin/AdminDashboardController/index';

$route['admin/products'] = 'Admin/Products/AdminProductsController/index';
$route['admin/products/store'] = 'Admin/Products/AdminProductsController/store';
$route['admin/products/create'] = 'Admin/Products/AdminProductsController/create';
$route['admin/products/edit/(:num)'] = 'Admin/Products/AdminProductsController/edit/$1';
$route['admin/products/delete/(:num)'] = 'Admin/Products/AdminProductsController/delete/$1';

$route['admin/categories'] = 'Admin/Categories/AdminCategoriesController/index';
$route['admin/categories/store'] = 'Admin/Categories/AdminCategoriesController/store';
$route['admin/categories/create'] = 'Admin/Categories/AdminCategoriesController/create';
$route['admin/categories/edit/(:num)'] = 'Admin/Categories/AdminCategoriesController/edit/$1';
$route['admin/categories/delete/(:num)'] = 'Admin/Categories/AdminCategoriesController/delete/$1';

$route['admin/orders'] = 'Admin/Orders/AdminOrdersController/index';
$route['admin/orders/show/(:num)'] = 'Admin/Orders/AdminOrdersController/show/$1';
$route['admin/orders/delete/(:num)'] = 'Admin/Orders/AdminOrdersController/delete/$1';
