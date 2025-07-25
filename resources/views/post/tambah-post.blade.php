<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Tambah Post dulu</h1>
    <a href="{{ route('posts.index') }}">Kembali ke post</a>

    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <label for="judul">Judul:</label>
        <input type="text" name="judul" id="judul" value="{{ old('judul') }}">
        @error('judul')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>
        <label for="isi">Isi:</label>
        <textarea name="isi" id="isi" rows="4">{{old('isi')}}</textarea>
        @error('isi')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>

</html>
