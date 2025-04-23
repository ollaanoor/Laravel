@extends('layouts.main')
@extends('includes.navbar')
@section('title', 'create post')
@section('content')
    <h1 class="block text-xl font-bold mt-4 mb-2 text-center">Creating a new post</h1>
    <form action="{{ route('posts.store') }}" method="POST" class="flex flex-col gap-3">
        @include('posts.form')
    </form>
@endsection