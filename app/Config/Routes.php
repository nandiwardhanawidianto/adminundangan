<?php

namespace Config;

use CodeIgniter\Routing\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();

// Default setup
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// Default route
$routes->get('/', 'Home::index');

/*
 * --------------------------------------------------------------------
 * Custom Routes
 * --------------------------------------------------------------------
 */

$routes->get('test', function() {
    return "Route test OK!";
});


// Admin routes
    $routes->group('admin', function($routes) {
    $routes->get('invitation', 'Admin\InvitationController::index');
    $routes->post('invitation/store', 'Admin\InvitationController::store');

    $routes->get('hero', 'Admin\HeroController::index');
    $routes->post('hero/store', 'Admin\HeroController::store');
    $routes->get('hero/list', 'Admin\HeroController::list');

    $routes->get('mempelai', 'Admin\MempelaiController::index');
    $routes->post('mempelai/store', 'Admin\MempelaiController::store');

    $routes->get('doa', 'Admin\DoaController::index');
    $routes->post('doa/store', 'Admin\DoaController::store');

    $routes->get('acara', 'Admin\AcaraController::index');
    $routes->post('acara/store', 'Admin\AcaraController::store');

    $routes->get('galeri', 'Admin\GaleriController::index');
    $routes->post('galeri/store', 'Admin\GaleriController::store');

    $routes->get('lovegift', 'Admin\LoveGiftController::index');
    $routes->post('lovegift/store', 'Admin\LoveGiftController::store');

});

// API routes
$routes->group('api', function($routes) {
    $routes->get('invitation/(:num)', 'Admin\InvitationController::apiShow/$1');
    $routes->options('invitation', 'Admin\InvitationController::options');
    $routes->post('invitation', 'Admin\InvitationController::store');
    
    $routes->get('hero', 'Admin\HeroController::apiHero');
    $routes->post('hero', 'Admin\HeroController::store');

    $routes->get('mempelai', 'Admin\MempelaiController::apiMempelai');
    $routes->post('mempelai', 'Admin\MempelaiController::store');

    $routes->get('doa', 'Admin\DoaController::apiDoa');
    $routes->post('doa', 'Admin\DoaController::store');

    $routes->get('acara', 'Admin\AcaraController::apiAcara');
    $routes->post('acara', 'Admin\AcaraController::store');

    $routes->get('galeri', 'Admin\GaleriController::apiGaleri');
    $routes->post('galeri', 'Admin\GaleriController::store');

    $routes->get('lovegift', 'Admin\LoveGiftController::apiLoveGift');
    $routes->post('lovegift', 'Admin\LoveGiftController::store');
    
});

return $routes;
