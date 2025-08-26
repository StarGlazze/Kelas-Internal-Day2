<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5" style="max-width: 600px;">
        <h2 class="mb-4">Edit Post</h2>

        <a href="{{ route('posts.index') }}" class="btn btn-secondary mb-3">Kembali ke post</a>

        <form action="{{ route('posts.update', $postingan->id) }}" method="post" enctype="multipart/form-data"
            class="card p-4 shadow-sm">
            @csrf
            @method('PUT')

            <div class="mb-3">
                @if ($postingan->foto)
                    <label class="form-label d-block">Foto Saat Ini:</label>
                    <img src="{{ asset('storage/' . $postingan->foto) }}" alt="Foto Postingan"
                        class="img-thumbnail mb-2" style="max-width: 200px; max-height: 200px;">
                @endif
                <label for="foto" class="form-label">Ganti Foto</label>
                <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                @error('foto')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control"
                    value="{{ old('judul', $postingan->judul) }}">
                @error('judul')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="isi" class="form-label">Isi</label>
                <textarea name="isi" id="isi" rows="4" class="form-control">{{ old('isi', $postingan->isi) }}</textarea>
                @error('isi')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
