@extends('layouts.main')
@extends('includes.navbar')
@section('title', 'edit post')
@section('content')
    <h1 class="block text-xl font-bold mt-4 mb-2 text-center">Editing post with id {{ $post->id }}</h1>
    <form action="{{ route('posts.update', ['id' => $post->id]) }}" method="POST" class="flex flex-col gap-3">
        @method('PUT')
        @include('posts.form')
    </form>
@endsection