<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {
        $data = new Library();
        echo $data->test();
        
        $library = Library::all();
        return view('library', ['library' => $library]);
    }
    public function show(){

    }

}
