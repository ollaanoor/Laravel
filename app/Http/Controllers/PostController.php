<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Post::factory(15)->create();
        return view('posts.index', ['posts' => Post::all(), 'users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create', ['users' => User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // return '<h1>Store a newly created resource in storage.</h1>';
        // dd($request->all());
        // Post::create($request->only(['title', 'body']));
        // return Post::create($request->all());
        return Post::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $postId)
    {
        $post = Post::find($postId);
        return view('posts.show', ['post' => $post, 'user' => User::find($post['user_id'])]);
        // return Post::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('posts.edit', ['post' => Post::find($id), 'users' => User::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        // return '<h1>Update the specified field resource with id ' . $id . ' in storage.</h1>';
        Post::where('id', $id)->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'), 
            'user_id' => $request->input('user_id'),
        ]);
        return redirect()->route('posts.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // return '<h1>Remove the specified resource with id ' . $id . ' from storage.</h1>';
        Post::where('id', $id)->delete();
        return redirect()->route('posts.index');
    }
}
