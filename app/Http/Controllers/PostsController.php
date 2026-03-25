<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostsController extends Controller
{
    public function index(): JsonResponse
    {
        $posts = Post::with('user')->get();
        return response()->json($posts);
    }

    public function show($post): JsonResponse
    {
        $posts = Post::find($post);
        return response()->json($posts);
    }

    public function searchPosts(): JsonResponse
    {
        $post = Post::where('id', 1)->get();
        return response()->json($post);
    }

    public function store(CreatePostRequest $request): JsonResponse
    {
        $data = $request->only(['title', 'body', 'userId']);
        $data['title'] = trim($data['title']);
        $post = Post::create($data);
        return response()->json($post, 201);
    }

    public function update(UpdatePostRequest $request, $post): JsonResponse
    {
        $data = $request->only(['title', 'body']);
        $post = Post::find($post);
        $post->update($data);
        return response()->json($post);
    }

    public function destroy($post): JsonResponse
    {
        $post = Post::find($post);
        $post->delete();
        return response()->json(['message' => 'Post deleted successfully', $post]);
    }
}
