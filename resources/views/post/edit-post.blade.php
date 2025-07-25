<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Edit post disini</h1>
    <a href="{{ route('posts.index') }}">Kembali ke post</a>

    <form action="{{ route('posts.update', $postingan->id) }}" method="post">
        @csrf
        @method('PUT')

        <label for="judul">Judul:</label>
        <input type="text" name="judul" id="judul" value="{{ old('judul', $postingan->judul) }}">
        @error('judul')
            <div style="color: red;">{{ $message }}</div>
            
        @enderror
        <br>

        <label for="isi">Isi:</label>
        <textarea name="isi" id="isi" rows="4">{{ old('isi', $postingan->isi) }}</textarea>
        @error('isi')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>

        <button type="submit">Simpan</button>
    </form>
</body>

</html>
