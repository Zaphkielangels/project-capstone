<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/profile', 'Home::viewProfile');
$routes->get('/mydashboard', 'Generate::index');
$routes->get('/certificate/(:num)', 'Generate::detail/$1');
$routes->get('/generate', 'Generate::viewGenerate');
$routes->post('/generate/save', 'Generate::save');
$routes->delete('/certificate/delete/(:num)', 'Generate::delete/$1');
$routes->get('/certificate/download/(:num)', 'Generate::download_file/$1');
$routes->get('/login', 'Auth::indexLogin');
$routes->get('/register', 'Auth::indexRegister');
$routes->post('/auth/register', 'Auth::register');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
