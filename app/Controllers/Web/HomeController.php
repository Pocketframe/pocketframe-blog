<?php

namespace App\Controllers\Web;

use Pocketframe\Http\Response\Response;

class HomeController
{
  public function index()
  {
    return Response::view('blog/welcome', [
      'title' => 'Pocketframe',
    ]);
  }
}
