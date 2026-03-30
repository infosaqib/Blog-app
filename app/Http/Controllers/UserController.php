<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser($name)
    {
        return view('user', ['name' => $name]);
    }
    public function login()
    {
        return view('admin.login');
    }
}
