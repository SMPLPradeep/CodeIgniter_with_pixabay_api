<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login'); // This is the default route

// Define your custom routes
$routes->get('auth/login', 'Auth::login'); 
$routes->post('auth/login', 'Auth::login'); 
$routes->get('auth/register', 'Auth::register');
$routes->post('auth/register', 'Auth::register');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('search', 'Search::index');
$routes->post('search/results', 'Search::results');
$routes->get('profile', 'Profile::index');
$routes->post('profile', 'Profile::index');
