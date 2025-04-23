@section('navbar')
    <div class="w-full h-[80px] bg-base-200 shadow mb-5 flex items-center px-4">
        <a href="{{ url('/') }}" class="mx-5 text-gray-500 text-lg font-medium">Home</a>

        <!-- Dropdown Wrapper -->
        <div class="relative group">
            <button onclick="toggleDropdown()" class="text-gray-500 text-lg font-medium">Posts ▼</button>
            
            <!-- Dropdown Menu -->
            <div id="dropdownMenu" class="absolute hidden bg-white shadow-lg mt-2 rounded-md w-40">
                <a href="{{ route('posts.index') }}" class="block px-4 py-2 hover:bg-gray-100 {{ request()->routeIs('posts.index') ? 'bg-blue-300' : '' }}">List</a>
                <a href="{{ route('posts.create') }}" class="block px-4 py-2 hover:bg-gray-100 {{ request()->routeIs('posts.create') ? 'bg-blue-300' : '' }}">New Post</a>
            </div>
        </div>
    </div>
    <script>
        function toggleDropdown() {
            document.getElementById("dropdownMenu").classList.toggle("hidden");
        }
    </script>
@show