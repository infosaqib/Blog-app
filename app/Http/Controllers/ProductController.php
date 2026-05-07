<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(2);
        return view('product', compact('products'));
    }
    public function show($id)
    {
        $product = Http::get("https://dummyjson.com/products/{$id}");
        return $product;
    }
    public function store()
    {
        return 'Product got stored';
    }
}
