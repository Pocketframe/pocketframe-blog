<?php

use App\Controllers\Web\Admin\AdminDashboardController;
use App\Controllers\Web\Admin\Categories\CategoriesController;

$router->group(['prefix' => 'admin'], function ($router) {
  $router->get('/', [AdminDashboardController::class, 'index'], name: 'admin.index');


  // categories
  $router->get('/categories', [CategoriesController::class, 'index'], name: 'admin.categories.index');
  $router->get('/categories/create', [CategoriesController::class, 'create'], name: 'admin.categories.create');
  $router->post('/categories', [CategoriesController::class, 'store'], name: 'admin.categories.store');
  $router->get('/categories/{id}', [CategoriesController::class, 'show'], name: 'admin.categories.show');
  $router->get('/categories/{id}/edit', [CategoriesController::class, 'edit'], name: 'admin.categories.edit');
  $router->put('/categories/{id}', [CategoriesController::class, 'update'], name: 'admin.categories.update');
  $router->delete('/categories/{id}', [CategoriesController::class, 'destroy'], name: 'admin.categories.destroy');
});
