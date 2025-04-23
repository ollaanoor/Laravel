@extends('layouts.main')
@section('title', 'show post')
@section('content')
    <!-- <h1>{{ $post }}</h1> -->
    <div class="text-lg">
        <span class="font-bold">Author:</span> {{ $user['name'] }}
        <br>
        <span class="font-bold">Title:</span> {{ $post['title'] }}
        <br>
        <span class="font-bold">Body:</span> {{ $post['body'] }}
    </div>
@endsection