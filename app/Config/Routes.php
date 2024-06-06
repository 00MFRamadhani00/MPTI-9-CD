<?php

use CodeIgniter\Router\RouteCollection;
use Config\Auth;

/**
 * @var RouteCollection $routes
 */

// Myth:Auth routes file.
$routes->group('', ['namespace' => 'App\Controllers'], static function ($routes) {
    // Load the reserved routes from Auth.php
    $config         = config(Auth::class);
    $reservedRoutes = $config->reservedRoutes;

    // Login/out
    $routes->get($reservedRoutes['login'], 'AuthController::login', ['as' => $reservedRoutes['login']]);
    $routes->post($reservedRoutes['login'], 'AuthController::attemptLogin');
    $routes->get($reservedRoutes['logout'], 'AuthController::logout');

    // Registration
    $routes->get($reservedRoutes['register'], 'AuthController::register', ['as' => $reservedRoutes['register']]);
    $routes->post($reservedRoutes['register'], 'AuthController::attemptRegister');

    // Activation
    $routes->get($reservedRoutes['activate-account'], 'AuthController::activateAccount', ['as' => $reservedRoutes['activate-account']]);
    $routes->get($reservedRoutes['resend-activate-account'], 'AuthController::resendActivateAccount', ['as' => $reservedRoutes['resend-activate-account']]);

    // Forgot/Resets
    $routes->get($reservedRoutes['forgot'], 'AuthController::forgotPassword', ['as' => $reservedRoutes['forgot']]);
    $routes->post($reservedRoutes['forgot'], 'AuthController::attemptForgot');
    $routes->get($reservedRoutes['reset-password'], 'AuthController::resetPassword', ['as' => $reservedRoutes['reset-password']]);
    $routes->post($reservedRoutes['reset-password'], 'AuthController::attemptReset');
});


// General Routes
$routes->get('/', 'Home::index');
$routes->get('/kriteria-list', 'Home::kriteriaList');
$routes->get('/ranking-list', 'Home::rangkingList');

// Admin Routes
$routes->get('/user-list', 'AdminController::karyawanList', ['filter' => 'role:admin']);
$routes->get('/user-detail/(:num)', 'AdminController::karyawanDetail/$1', ['filter' => 'role:admin']);
$routes->delete('/user-delete/(:num)', 'AdminController::deleteUser/$1', ['filter' => 'role:admin']);

// Karyawan Routes
$routes->get('/profile', 'karyawanController::profile', ['filter' => 'role:karyawan']);
$routes->get('/create-profile', 'karyawanController::createProfile', ['filter' => 'role:karyawan']);
$routes->post('/save-profile', 'karyawanController::saveProfile', ['filter' => 'role:karyawan']);