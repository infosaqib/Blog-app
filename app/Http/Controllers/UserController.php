<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function getUser($name)
    {
        $users = ['bilal', 'zain', 'uzair'];
        return view('user', ['name' => $name, 'users' => $users]);
    }
    public function login()
    {
        if (View::exists('user-form')) {
            return view('user-form');
        } else {
            echo 'No View Found';
        }
    }

    public function addUser(Request $request)
    {
        return $request;
    }
}
