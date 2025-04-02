<?php

/**
 * Web Routes
 *
 * Define your web routes here. Routes are registered with the Router
 * and can be assigned middleware for request filtering.
 *
 * Example:
 * $router->get('/path', [Controller::class, 'method'], name: 'route-name');
 */

use App\Controllers\Web\HomeController;


$router->get('/', [HomeController::class, 'index'], name: 'home');

// include blog routes
require base_path('routes/blog.php');

// include admin routes
require base_path('routes/admin.php');

