<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return '<h1>Store a newly created resource in storage.</h1>';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('posts.show', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('posts.edit', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return '<h1>Update the specified field resource with id ' . $id . ' in storage.</h1>';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return '<h1>Remove the specified resource with id ' . $id . ' from storage.</h1>';
    }
}
