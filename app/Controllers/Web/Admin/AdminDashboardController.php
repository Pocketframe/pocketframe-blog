<?php

namespace App\Controllers\Web\Admin;

use Pocketframe\Http\Request\Request;
use Pocketframe\Http\Response\Response;

class AdminDashboardController
{
  public function index(): Response
  {
    return Response::view('admin.dashboard');
  }
}
