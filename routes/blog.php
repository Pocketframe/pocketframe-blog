<?php

use App\Controllers\Web\Blog\Categories\BlogCategoriesController;


$router->group(['prefix' => 'blog'], function ($router) {
  $router->get('/categories', [BlogCategoriesController::class, 'index'], name: 'categories.index');
});
