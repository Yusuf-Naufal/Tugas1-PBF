<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin\DashboardController::index');

//Routes Admin Dashboard
$routes->get('dashboard', 'Admin\DashboardController::index');



//Routes Admin Produk 
$routes->get('daftar-produk','Admin\ProdukController::index');
$routes->get('daftar-kategori','Admin\ProdukController::kategori');

//BUAT FORM TAMBAH 
$routes->post('daftar-kategori/tambah','Admin\ProdukController::store');

//BUAT FORM UBAH 
$routes->post('daftar-kategori/ubah/(:num)','Admin\ProdukController::update/$1');//Update, $1 -> idnya berapa

//BUAT FORM HAPUS 
$routes->post('daftar-kategori/hapus/(:num)','Admin\ProdukController::destroy/$1');

//Routes Contoh
$routes->get('contoh','ContohController::index');


//LATIHAN STATIC PAGES
//LATIHAN NEWS SECTION
use App\Controllers\News; // Add this line
use App\Controllers\Pages;
use App\Controllers\ngoding;

$routes->get('ngoding', [ngoding::class, 'index']); 
$routes->get('news', [News::class, 'index']);           // Add this line
$routes->get('news/new', [News::class, 'new']); // Add this line
$routes->post('news', [News::class, 'create']); // Add this line
$routes->get('news/(:segment)', [News::class, 'show']); // Add this line

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);







