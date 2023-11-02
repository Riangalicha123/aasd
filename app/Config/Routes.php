<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Funeral::index');

$routes->get('/shop', 'Funeral::shop');
$routes->get('/about', 'Funeral::aboutUs');
$routes->get('/services', 'Funeral::shopServices');
$routes->get('/contact', 'Funeral::contactSection');
$routes->get('/cart', 'Funeral::cart');
$routes->get('product/(:any)', 'Funeral::singleProduct/$1');

$routes->get('/login', 'UserController::loginPage');
$routes->get('/signup', 'UserController::signupPage');
$routes->post('/registerAcc', 'UserController::register');
$routes->post('/loginAuth', 'UserController::loginAuth');
$routes->get('/logout', 'UserController::logout');

$routes->get('/dashboard', 'AdminController::dashboard',['filter' => 'authGuard']);
$routes->get('/products', 'AdminController::viewProducts',['filter' => 'authGuard']);
$routes->post('saveProduct', 'AdminController::addProduct',['filter' => 'authGuard']);
$routes->get('deleteProd/(:any)', 'AdminController::deleteProd/$1',['filter' => 'authGuard']);
$routes->get('editProd/(:any)', 'AdminController::editProd/$1',['filter' => 'authGuard']);
$routes->post('editProd/updateProd', 'AdminController::updateProd',['filter' => 'authGuard']);