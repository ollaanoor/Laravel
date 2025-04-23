@extends('layouts.main')
@extends('includes.navbar')
@section('title', 'Posts')
@section('content')
    <!-- <h1 class="text-2xl font-bold text-center mb-6 text-gray-800">Posts</h1> -->
    <div class="overflow-x-auto">
        <table class="w-[70%] mx-auto border-collapse border border-gray-300 shadow-lg rounded-lg">
            <thead class="bg-blue-400 text-white">
                <tr>
                    <th class="p-4 text-left">ID</th>
                    <th class="p-4 text-center">Writer</th>
                    <th class="p-4 text-center">Title</th>
                    <th class="p-4 text-center">Body</th>
                    <th class="p-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($posts as $post)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition">
                        <td class="p-4 font-medium text-gray-700">{{ $post['id'] }}</td>
                        <td class="p-4 font-medium text-gray-700">
                        @foreach ($users as $user)
                            @if ($user->id == $post['user_id'])
                                {{ $user->name }}
                            @endif
                        @endforeach
                        </td>
                        <td class="p-4 font-medium text-gray-700">
                            <a href="{{ route('posts.show', [ 'id' => $post['id'] ]) }}" class="">{{ $post['title'] }}</a>
                        </td>
                        <td class="p-4 text-gray-600">{{ $post['body'] }}</td>
                        <td class="p-4">
                            <div class="flex space-x-4">
                                <a href="{{ route('posts.edit', ['id' => $post['id']]) }}" 
                                   class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">
                                    Edit
                                </a>
                                <form action="{{ route('posts.destroy', ['id' => $post['id']]) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" 
                                            class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection