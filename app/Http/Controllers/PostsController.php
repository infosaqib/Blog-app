<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/posts",
     *     summary="List all posts",
     *     tags={"Posts"},
     *     @OA\Response(response=200, description="OK")
     * )
     */
    public function index(): JsonResponse
    {
        $posts = Post::with('user')->get();
        return response()->json($posts);
    }

    /**
     * @OA\Get(
     *     path="/posts/{id}",
     *     summary="Get a post by ID",
     *     tags={"Posts"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="OK"),
     *     @OA\Response(response=404, description="Not found")
     * )
     */
    public function show($post): JsonResponse
    {
        $posts = Post::find($post);
        return response()->json($posts);
    }

    /**
     * @OA\Get(
     *     path="/posts/search",
     *     summary="Search posts by ID 1",
     *     tags={"Posts"},
     *     @OA\Response(response=200, description="OK")
     * )
     */
    public function searchPosts(): JsonResponse
    {
        $post = Post::where('id', 1)->get();
        return response()->json($post);
    }

    /**
     * @OA\Post(
     *     path="/posts",
     *     summary="Create a post",
     *     tags={"Posts"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title","body","userId"},
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="body", type="string"),
     *             @OA\Property(property="userId", type="integer")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Created")
     * )
     */
    public function store(CreatePostRequest $request): JsonResponse
    {
        $data = $request->only(['title', 'body', 'userId']);
        $data['title'] = trim($data['title']);
        $post = Post::create($data);
        return response()->json($post, 201);
    }

    /**
     * @OA\Put(
     *     path="/posts/{id}",
     *     summary="Update a post",
     *     tags={"Posts"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="body", type="string")
     *         )
     *     ),
     *     @OA\Response(response=200, description="OK")
     * )
     */
    public function update(UpdatePostRequest $request, $post): JsonResponse
    {
        $data = $request->only(['title', 'body']);
        $post = Post::find($post);
        $post->update($data);
        return response()->json($post);
    }

    /**
     * @OA\Delete(
     *     path="/posts/{id}",
     *     summary="Delete a post",
     *     tags={"Posts"},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Deleted")
     * )
     */
    public function destroy($post): JsonResponse
    {
        $post = Post::find($post);
        $post->delete();
        return response()->json(['message' => 'Post deleted successfully', $post]);
    }
}
