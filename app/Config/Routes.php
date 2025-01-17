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

$routes->group('messages', function ($routes) {
    $routes->post('send', 'MessageController::sendMessage');
    $routes->get('get/(:num)/(:num)', 'MessageController::getMessages/$1/$2');
    $routes->get('(:num)/(:num)', 'MessageController::index/$1/$2');
    $routes->get('(:num)', 'MessageController::chat/$1');
    $routes->put('read/(:num)', 'MessageController::markAsRead/$1');
});

// route filter auth
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('/dashboard', 'Home::index');
    $routes->get('message', 'MessageController::index');
});



