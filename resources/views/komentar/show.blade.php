<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('komentar.index') }}">Kembali</a>
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif    
    <h2>{{ $komentar->post->judul }}</h2>
    <h2>{{ $komentar->user->name }}</h2>
    <h2>{{ $komentar->isi }}</h2>
</body>
</html>