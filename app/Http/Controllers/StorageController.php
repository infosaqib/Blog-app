<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
     public function index()
     {
          $images = Storage::disk('public')->files('images');
          return view('upload', compact('images'));
     }
     public function upload(Request $request)
     {
          $request->validate([
               'file' => 'required|image|mimes:jpeg,gif,jpg,png,webp|max:2038'
          ]);
          $request->file('file')->store('images', 'public');
          return redirect('upload');
     }
}
