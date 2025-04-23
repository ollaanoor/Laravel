@csrf
<div class="w-xl mx-auto mt-5 p-6 bg-white rounded-lg shadow-md">
    <label class="block text-lg mb-2">
        <span class="font-bold">Title</span>
        <input 
            type="text" 
            name="title" 
            value="{{ old('title', isset($post) ? $post->title : null) }}" 
            placeholder="Post title" 
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
    </label>
    @error('title')
        <div class="text-red font-semibold">{{ $message }}</div>
    @enderror
    <label class="block text-lg mt-4 mb-2">
        <span class="font-bold">Body</span>
        <textarea 
            rows="3" 
            name="body" 
            placeholder="Post body" 
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        >{{ old('body', isset($post) ? $post->body : null) }}</textarea>
    </label>
    @error('body')
        <div class="text-red font-semibold">{{ $message }}</div>
    @enderror

    <label class="block text-lg mt-4 mb-2">
    <span class="font-bold">Writer:</span>
    <select name="user_id" id="user_id" required class="w-full px-4 py-2 border rounded-lg bg-white shadow focus:outline-none transition">
        @foreach($users as $user)
            <option value="{{ $user->id }}" {{ isset($post) && $post->user_id == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach
    </select>
    </label>
    
    <button 
        type="submit" 
        class="w-full mt-4 bg-blue-400 text-white py-2 px-4 rounded-lg hover:bg-blue-500 transition duration-300"
    >
        Submit
    </button>
</div>