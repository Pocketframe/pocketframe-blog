<?php

namespace App\Controllers\Web\Blog\Categories;

use Pocketframe\Http\Response\Response;

class BlogCategoriesController
{
  public function index(): Response
  {
    return Response::view('blog/categories/index');
  }
}
