<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('email', 'Home::email');
$routes->get('contact', 'Home::contact');
$routes->get('notification', 'Home::notification');

$routes->get('/login', 'AuthController::login');
$routes->post('/login-process', 'AuthController::loginProcess');
$routes->get('/logout', 'AuthController::logout');

// route filter auth
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('/dashboard', 'Home::index');
    $routes->get('message', 'Home::message');
});



