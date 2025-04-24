<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Post::factory(15)->create();
        return view('posts.index', ['posts' => Post::all(), 'users' => User::all()]);
        // return view('posts.index', ['posts' => Post::with('user')->orderByDesc('created_at')->get()]);

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
        $validatedData = $request->validated();
        $validatedData['user_id'] = Auth::id(); 

        $post = Post::create($validatedData); 
        event(new PostCreated($post));

        return redirect()->route('posts.index');
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
        // Post::where('id', $id)->update([
        //     'title' => $request->input('title'),
        //     'body' => $request->input('body'), 
        //     'user_id' => $request->input('user_id'),
        // ]);
        Post::where('id', $id)->update($request->validated());
        return redirect()->route('posts.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if ($post->user_id != Auth::id()) {
            abort(403, 'Unauthorized');
        }
        // return '<h1>Remove the specified resource with id ' . $id . ' from storage.</h1>';
        Post::where('id', $id)->delete();
        return redirect()->route('posts.index');
    }
}
