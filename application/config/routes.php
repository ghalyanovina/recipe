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
$route['page/(:num)'] = 'welcome/index/$1';
$route['kategori'] = 'welcome/kategori';
$route['kategori/(:num)'] = 'welcome/kategori/$1';
$route['kategori/(:num)/(:num)'] = 'welcome/kategori/$1/$2';
$route['login'] = 'User/login';
$route['login/(:any)'] = 'User/login/$1';
$route['doLogin'] = 'User/doLogin';
$route['logout'] = 'User/logout';
$route['daftar'] = 'User/daftar';
$route['doDaftar'] = 'User/doDaftar';
$route['artikel/(:num)'] = 'User/artikel/$1';
$route['kirimkomentar'] = 'User/kirimkomentar';
$route['hapuskomentar'] = 'User/hapuskomentar';
$route['pengumuman/(:num)'] = 'User/pengumuman/$1';
$route['search'] = 'User/search';
$route['search/(:num)'] = 'User/search/$1';
$route['thread/id/(:num)'] = 'User/detail/$1';
$route['tambah-rating'] = 'User/tambah_rating';
$route['admin'] = 'admin/index';
$route['admin/doLogin'] = 'admin/doLogin';
$route['admin/kategori'] = 'admin/kategori';
$route['admin/simpankategori'] = 'admin/simpankategori';
$route['admin/editkategori'] = 'admin/kategori/$1';
$route['admin/updatekategori'] = 'admin/updatekategori/$1';
$route['admin/hapuskategori/(:num)'] = 'admin/hapuskategori/$1';
$route['admin/berita'] = 'admin/berita';
$route['admin/berita/(:num)'] = 'admin/berita/$1';
$route['admin/updateberita'] = 'admin/updateberita';
$route['admin/simpanBerita'] = 'admin/simpanBerita';
$route['admin/member'] = 'admin/member';
$route['admin/admins'] = 'admin/admins';
$route['admin/hapusadmins/(:num)'] = 'admin/hapusadmins/$1';
$route['admin/profil'] = 'admin/profil';
$route['admin/logout'] = 'admin/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['(:any)/edit/(:num)'] = "User/editThread/$2";
$route['(:any)/hapus/(:num)'] = "User/hapusThread/$2";
$route['(:any)/editprofil'] = "User/editprofil";
$route['(:any)/updateprofil'] = "User/updateprofil";
$route['(:any)/editfoto'] = "User/editfoto";
$route['(:any)/updatefoto'] = "User/updatefoto";
$route['(:any)/tambah'] = 'User/tambahThread';
$route['(:any)/simpanThread'] = 'User/simpanThread';
$route['(:any)'] = "User/lihatProfil/$1";