<?php

use App\Controllers\Web\Admin\AdminDashboardController;
use App\Controllers\Web\Admin\Categories\CategoriesController;

$router->group(['prefix' => 'admin'], function ($router) {
  $router->get('/', [AdminDashboardController::class, 'index'], name: 'admin.index');


  // categories
  $router->group(['controller' => CategoriesController::class], function ($router) {
    $router->get('/categories', 'index', name: 'admin.categories.index');
    $router->get('/categories/create', 'create', name: 'admin.categories.create');
    $router->post('/categories', 'store', name: 'admin.categories.store');
    $router->get('/categories/{id}', 'show', name: 'admin.categories.show');
    $router->get('/categories/{id}/edit', 'edit', name: 'admin.categories.edit');
    $router->put('/categories/{id}', 'update', name: 'admin.categories.update');
    $router->delete('/categories/{id}', 'destroy', name: 'admin.categories.destroy');
  });
});
