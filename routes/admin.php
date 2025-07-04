<?php

use App\Controllers\Web\Admin\AdminDashboardController;
use App\Controllers\Web\Admin\Categories\CategoriesController;
use App\Controllers\Web\Admin\Posts\PostsController;

$router->group(['prefix' => 'admin'], function ($router) {
  $router->get('/', [AdminDashboardController::class, 'index'], name: 'admin.index');



  // categories
  $router->group(['controller' => CategoriesController::class], function ($router) {
    $router->post('/categories/import', 'import', name: 'admin.categories.import');
    $router->get('/categories/export', 'export', name: 'admin.categories.export');

    $router->get('/categories', 'index', name: 'admin.categories.index');
    $router->get('/categories/create', 'create', name: 'admin.categories.create');
    $router->post('/categories', 'store', name: 'admin.categories.store');
    $router->get('/categories/{id}', 'show', name: 'admin.categories.show');
    $router->get('/categories/{id}/edit', 'edit', name: 'admin.categories.edit');
    $router->put('/categories/{id}', 'update', name: 'admin.categories.update');
    $router->delete('/categories/{id}', 'destroy', name: 'admin.categories.destroy');
  });

  // posts
  $router->group(['controller' => PostsController::class], function ($router) {
    $router->get('/posts', 'index', name: 'admin.posts.index');
    $router->get('/posts/create', 'create', name: 'admin.posts.create');
    $router->post('/posts', 'store', name: 'admin.posts.store');
    $router->get('/posts/{id}', 'show', name: 'admin.posts.show');
    $router->get('/posts/{id}/edit', 'edit', name: 'admin.posts.edit');
    $router->put('/posts/{id}', 'update', name: 'admin.posts.update');
    $router->delete('/posts/{id}', 'destroy', name: 'admin.posts.destroy');
  });

  // comments
  // $router->group(['controller' => CommentsController::class], function ($router) {
  //   $router->get('/comments', 'index', name: 'admin.comments.index');
  //   $router->get('/comments/{id}', 'show', name: 'admin.comments.show');
  //   $router->get('/comments/{id}/edit', 'edit', name: 'admin.comments.edit');
  //   $router->put('/comments/{id}', 'update', name: 'admin.comments.update');
  //   $router->delete('/comments/{id}', 'destroy', name: 'admin.comments.destroy');
  // });
});
