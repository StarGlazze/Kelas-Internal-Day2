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
    <a href="/posts">Kembali ke post</a>

        <form action="/update/{{ $postingan->id }}" method="post">
        @csrf
        @method('PUt')

        <label for="judul">Judul:</label>
        <input type="text" name="judul" value="{{ $postingan->judul }}">

        <br>

        <label for="isi">Isi:</label>
        <textarea name="isi" id="isi" rows="4">{{ $postingan->isi }}</textarea>
        
        <br>

        <button type="submit">Simpan</button>
        </form>    
</body>
</html>