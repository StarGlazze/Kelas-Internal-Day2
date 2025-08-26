<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container">
            <span class="navbar-brand fw-bold">Manage Posts</span>
            <div>
                <a href="{{ route('home') }}" class="btn btn-secondary btn-sm me-2">Back to Home</a>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <h1 class="fw-bold text-dark mb-4 text-center">All Posts</h1>

        <div class="mb-4 text-end">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Add New Post</a>
        </div>

        @if ($dataPost->isEmpty())
            <p class="text-center text-muted">No posts available.</p>
        @else
            <div class="table-responsive bg-white rounded shadow-sm">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPost as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($item->foto)
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}"
                                            class="rounded" style="width: 96px; height: 64px; object-fit: cover;">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td class="fw-bold text-dark">{{ $item->judul }}</td>
                                <td class="text-muted"
                                    style="max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $item->isi }}
                                </td>
                                <td>
                                    <a href="{{ route('posts.edit', $item->id) }}"
                                        class="btn btn-warning btn-sm me-1">Edit</a>
                                    <a href="{{ route('posts.show', $item->id) }}"
                                        class="btn btn-success btn-sm me-1">Detail</a>
                                    <form action="{{ route('posts.destroy', $item->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this post?')"
                                            class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</body>

</html>
