<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $postingan->judul }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container">
            <span class="navbar-brand fw-bold">Detail Postingan</span>
            <div class="d-flex align-items-center">
                <a href="{{ route('home') }}" class="btn btn-secondary btn-sm me-2">Back to Home</a>
                @auth
                    <form action="{{ route('doLogout') }}" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login to Comment</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                @if ($postingan->foto)
                    <img src="{{ asset('storage/' . $postingan->foto) }}" alt="{{ $postingan->judul }}"
                        class="img-fluid rounded mb-3" style="max-width: 100%; height: auto; object-fit: contain;">
                @endif
                <h1 class="card-title h3 fw-bold mb-3">{{ $postingan->judul }}</h1>
                <p class="card-text text-muted">{{ $postingan->isi }}</p>
            </div>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h2 class="h5 fw-bold mb-4">Comments ({{ $postingan->komentars->count() }})</h2>
                @if ($postingan->komentars->isEmpty())
                    <p class="text-muted mb-4">No comments yet. Be the first to comment!</p>
                @else
                    <div class="mb-4">
                        @foreach ($postingan->komentars as $komentar)
                            <div class="border-bottom pb-3 mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3"
                                        style="width: 40px; height: 40px; font-weight: bold;">
                                        {{ strtoupper(substr($komentar->user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <span class="fw-semibold">{{ $komentar->user->name }}</span>
                                        <span
                                            class="text-muted small d-block">{{ $komentar->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <p class=" ms-1 mb-0">{{ $komentar->isi }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif

                @auth
                    <h3 class="h6 fw-bold mb-3">Leave a Comment</h3>
                    <form action="{{ route('komentar.storeFromPublic') }}" method="post">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $postingan->id }}">
                        <div class="mb-3">
                            <label for="isi" class="form-label">Your Comment:</label>
                            <textarea name="isi" id="isi" rows="4" class="form-control @error('isi') is-invalid @enderror"
                                placeholder="Write your comment here...">{{ old('isi') }}</textarea>
                            @error('isi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                    </form>
                @else
                    <p class="text-muted text-center mt-4">
                        Please <a href="{{ route('login') }}" class="text-primary text-decoration-underline">login</a> to
                        leave a comment.
                    </p>
                @endauth
            </div>
        </div>
    </div>
</body>

</html>
