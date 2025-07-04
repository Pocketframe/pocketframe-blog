<?php

/**
 * NOTE: This file should not be removed. It extend the function file from the core
 * which is part of the function component of the framework. The function file in
 * the core should not be modified whatsoever.
 *
 * Define all you custom functions here in this file and will be auto discoverable
 * anywhere in the application.
 */

use Pocketframe\PocketORM\Essentials\DataSet;
use Pocketframe\Sessions\Session;

// require BASE_PATH . '/vendor/pocketframe/framework/src/functions.php';


if (!function_exists('login')) {
  function login($user)
  {
    Session::put('user', [
      'id'          => $user['id'],
      'username'    => $user['username'],
      'email'       => $user['email'],
      'business_id' => $user['business_id'],
      'branch_id'   => $user['branch_id'],
      'branch_name' => $user['branch_name'],
    ]);

    session_regenerate_id(true);
  }
}

if (!function_exists('logout')) {
  function logout()
  {
    Session::destroy();
  }
}

if (!function_exists('tag_list')) {
  function tag_list(array|DataSet $tags): string
  {
    // If it's a DataSet, pluck into an array first
    if ($tags instanceof DataSet) {
      $names = $tags->pluck('tag_name');
    } else {
      $names = array_map(fn($t) => $t->tag_name, $tags);
    }

    return implode(', ', $names);
  }
}
