<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function any()
    {
        echo 'any function called with method ';
        echo request()->method();
    }
    public function match()
    {
        echo 'match function called with method ';
        echo request()->method();
    }
    public function getAllPosts()
    {
        //with() - Eager Loading (optimzed)
        return Post::with('user')->select('title', 'description', 'user_id')->get(); //Objects
        // return Post::pluck('title'); // Array of titles
    }
    public function LoadPosts()
    {
        //load() - eager loading
        $needUser = true;
        $posts = Post::all();
        if ($needUser) {
            foreach ($posts as $post) {
                $post->load('user');
            }
        }
        return $posts;
    }
    public function getLazyPosts()
    {
        //Without Eager Loading
        $posts = Post::all();
        foreach ($posts as $post) {
            $post->user;
        }
        return $posts;
    }
    public function orderedPosts()
    {
        return Post::orderBy('title', 'asc')->get();
    }
    public function getPostById(Request $request)
    {
        // return Post::find($request->id);
        return Post::findOrFail($request->id);
    }
    public function getFirstPost()
    {
        return Post::select('title', 'description')->first();
    }
    public function searchPosts()
    {
        //scope usage
        return Post::desc('king')->get();
    }
    public function LimitedPosts(Request $request)
    {
        return Post::limit($request->limit)->get();
    }
    public function createPost()
    {
        return Post::create([
            'user_id' => 2,
            'title' => 'Black Diamond',
            'description' => 'No more',
        ]);
    }
    public function updatePosts()
    {
        Post::where('id', 3)->update(['title' => 'Earch']);
    }
    public function deletePosts()
    {
        // Post::where('id', 2)->delete();
        Post::destroy(1);
        echo 'Post Deleted';
    }
}
