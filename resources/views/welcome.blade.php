<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container">
            <span class="navbar-brand fw-bold">My Blog</span>
            <div class="d-flex align-items-center">
                @auth
                    <span class="text-secondary me-3">Welcome, {{ auth()->user()->name }}!</span>
                    <form action="{{ route('doLogout') }}" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-success btn-sm">Register</a>
                @endguest
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="fw-bold text-dark mt-4 mb-4 text-center">Latest Posts</h1>

        @if ($dataPost->isEmpty())
            <p class="text-center text-muted">No posts available.</p>
        @else
            <div class="row g-4">
                @foreach ($dataPost as $post)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm">
                            @if ($post->foto)
                                <img src="{{ asset('storage/' . $post->foto) }}" alt="{{ $post->judul }}"
                                    class="card-img-top" style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold text-dark">{{ $post->judul }}</h5>
                                <p class="card-text text-muted mb-3"
                                    style="overflow:hidden;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;">
                                    {{ $post->isi }}</p>
                                <a href="{{ route('posts.show', $post->id) }}"
                                    class="btn btn-outline-primary mt-auto">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>

</html>
