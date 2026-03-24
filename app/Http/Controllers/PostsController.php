<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return $posts;
    }
    public function show($val)
    {
        $response = Http::get("https://dummyjson.com/posts/$val");
        return $response->json();
    }

    public function searchPosts($val)
    {
        $response = Http::get("https://dummyjson.com/posts/search?q=$val");
        return $response->json();
    }

    public function store(CreatePostRequest $request)
    {
        $response = Http::post('https://dummyjson.com/posts/add', [
            'title' => $request->input('title'),
            'userId' => $request->input('userId'),
        ]);
        return $response->json();
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:1',
            'userId' => [
                'required',
                function ($attr, $value, $fail) {
                    if (!is_int($value)) {
                        $fail('userId must be an integer');
                    }
                }
            ]
        ]);

        $response = Http::put('https://dummyjson.com/posts/1', $validated);
        return $response->json();
    }

    public function destroy()
    {
        $response = Http::delete('https://dummyjson.com/posts/1');
        return $response->json();
    }
}
