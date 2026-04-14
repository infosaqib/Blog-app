<?php

namespace App\Http\Controllers;

use App\Rules\Uppercase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        $users = DB::table('users')->get();
        return "Users:" . $users;
    }
    public function getVerifiedUsers()
    {
        $users = DB::table('users')->whereNotNull('email_verified_at')->get();
        return $users;
    }
    public function getFirstUser()
    {
        $users = DB::table('users')->first();
        return $users;
    }
    public function getUser()
    {
        $users = DB::select('select * from users');
        // dd($users);
        return view('user', ['users' => $users]);
    }
    public function updateUser(Request $request)
    {
        $data = array_filter([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'country' => $request->country,
            'hobbies' => json_encode($request->hobbies ?? [])
        ]);
        $user = DB::table('users')->where('id', $request->id)->update($data);
        if ($user) {
            echo 'Data updated';
        } else {
            echo 'Data not updated';
        }
        ;
    }
    public function deleteUser($id)
    {
        $user = DB::table('users')->where('id', $id)->delete();
        if ($user) {
            echo 'User deleted';
        } else {
            echo 'User not deleted';
        }
        ;
    }
    public function login()
    {
        if (View::exists('auth.login')) {
            return view('auth.login');
        } else {
            echo 'No View Found';
        }
    }
    public function register()
    {
        if (View::exists('auth.register')) {
            return view('auth.register');
        } else {
            echo 'No View Found';
        }
    }
    public function setting()
    {
        if (View::exists('auth.update')) {
            return view('auth.update');
        } else {
            echo 'No View Found';
        }
    }

    public function loginUser(Request $request)
    {
        $request->session()->put('user', $request->input('email'));
        return redirect('user');
    }
    public function logoutUser(Request $request)
    {
        $request->session()->pull('user');
        return redirect('login');
    }
    public function addUser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:6', new Uppercase()],
            'email' => 'required | email',
            'gender' => 'required',
            'country' => 'required',
            'hobbies' => 'required',
        ], [
            'name.required' => 'The name field can not be empty',
            'name.min' => 'The name field should not less than 3 characters'
        ]);
        $result = DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'country' => $request->country,
            'hobbies' => json_encode($request->hobbies)
        ]);

        if ($result) {
            echo 'Data inserted successfully';
        } else {
            echo 'Data could not inserted';
        }
    }

}
