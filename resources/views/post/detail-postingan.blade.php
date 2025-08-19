<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $postingan->judul }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100 font-sans antialiased">
    <nav class="bg-white shadow-md p-4 flex justify-between items-center">
        <div class="text-2xl font-bold text-gray-800">Detail Postingan</div>
        <div>
            <a href="{{ route('home') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2">Back to Home</a>
            @auth
                <form action="{{ route('doLogout') }}" method="post" class="inline">
                    @csrf
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Login to Comment</a>
            @endauth
        </div>
    </nav>

    <div class="container mx-auto p-6">
        <div class="bg-white rounded-lg shadow-md p-8 mb-8">
            @if ($postingan->foto)
                <img src="{{ asset('storage/' . $postingan->foto) }}"
                    alt="{{ $postingan->judul }}"
                    style="max-width: 100%; height: auto; object-fit: contain;"
                    class="rounded-lg mb-6">
            @endif
            <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $postingan->judul }}</h1>
            <p class="text-gray-700 leading-relaxed text-lg">{{ $postingan->isi }}</p>
        </div>

        <div class="bg-white rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Comments ({{ $postingan->komentars->count() }})</h2>

            @if ($postingan->komentars->isEmpty())
                <p class="text-gray-600 mb-6">No comments yet. Be the first to comment!</p>
            @else
                <div class="space-y-6 mb-8">
                    @foreach ($postingan->komentars as $komentar)
                        <div class="border-b border-gray-200 pb-4 last:border-b-0">
                            <div class="flex items-center mb-2">
                                <div
                                    class="w-10 h-10 bg-blue-200 rounded-full flex items-center justify-center text-blue-800 font-bold text-sm mr-3">
                                    {{ strtoupper(substr($komentar->user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $komentar->user->name }}</p>
                                    <p class="text-gray-500 text-xs">{{ $komentar->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <p class="text-gray-700 ml-12">{{ $komentar->isi }}</p>
                        </div>
                    @endforeach
                </div>
            @endif

            @auth
                <h3 class="text-xl font-bold text-gray-800 mb-4">Leave a Comment</h3>
                <form action="{{ route('komentar.storeFromPublic') }}" method="post">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $postingan->id }}">
                    <div class="mb-4">
                        <label for="isi" class="block text-gray-700 text-sm font-bold mb-2">Your Comment:</label>
                        <textarea name="isi" id="isi" rows="5"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('isi') border-red-500 @enderror"
                            placeholder="Write your comment here...">{{ old('isi') }}</textarea>
                        @error('isi')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Submit Comment
                    </button>
                </form>
            @else
                <p class="text-gray-600 text-center mt-8">Please <a href="{{ route('login') }}"
                        class="text-blue-500 hover:underline">login</a> to leave a comment.</p>
            @endauth
        </div>
    </div>
</body>

</html>
