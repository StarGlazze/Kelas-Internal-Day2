<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100 font-sans antialiased">
    <nav class="bg-white shadow-md p-4 flex justify-between items-center">
        <div class="text-2xl font-bold text-gray-800">My Blog</div>
        <div>
            @auth
                <span class="text-gray-700 mr-4">Welcome, {{ auth()->user()->name }}!</span>
                <form action="{{ route('doLogout') }}" method="post" class="inline">
                    @csrf
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Logout</button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-2">Login</a>
                <a href="{{ route('register') }}"
                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Register</a>
            @endguest
        </div>
    </nav>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mt-8 mb-6 text-center">Latest Posts</h1>

        @if ($dataPost->isEmpty())
            <p class="text-center text-gray-600">No posts available.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($dataPost as $post)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        @if ($post->foto)
                            <img src="{{ asset('storage/' . $post->foto) }}" alt="{{ $post->judul }}"
                                class="w-full h-48 object-cover">
                        @endif
                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $post->judul }}</h2>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $post->isi }}</p>
                            <a href="{{ route('posts.show', $post->id) }}"
                                class="text-blue-500 hover:underline font-medium">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>

</html>
