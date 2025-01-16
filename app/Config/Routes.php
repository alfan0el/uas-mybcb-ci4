<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::loginView');

// Auth
$routes->get('/login', 'AuthController::loginView');
$routes->post('/login/auth', 'AuthController::loginAuth');
$routes->get('/signup', 'AuthController::signupView');
$routes->post('/signup/auth', 'AuthController::signupAuth');
$routes->get('/logout', 'AuthController::logout');

// Dashboard
$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/dashboard', 'DashboardController::dashboardView');
    $routes->get('/transfer', 'DashboardController::transferView/');
    $routes->post('/transfer/send/(:num)', 'DashboardController::transferSend/$1');
    $routes->get('/profile', 'DashboardController::profileView');
    $routes->post('/profile/update/(:num)', 'DashboardController::profileUpdate/$1');
});