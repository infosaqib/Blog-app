<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return 'Products list';
    }
    public function show($id)
    {
        $product = Http::get("https://dummyjson.com/products/{$id}");
        return view('product', ['product' => $product]);
    }
    public function store()
    {
        return 'Product got stored';
    }
}
