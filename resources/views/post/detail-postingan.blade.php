<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Detail Postingan</h1>

    <a href="{{ route('posts.index') }}">Kembali ke post</a>

    <h2>{{ $postingan->judul }}</h2>
    <p>{{ $postingan->isi }}</p>

    <br>
    <h3>Data Komentar</h3>
    <table border="1">
        <thead>
            <tr>
                <td>Nama Pengirim</td>
                <td>Email</td>
                <td>Isi Komen</td>
            </tr>
        </thead>
        <tbody>
            @forelse ($postingan->komentars as $komentar)
                <tr>
                    <td>{{ $komentar->user->name }}</td>
                    <td>{{ $komentar->user->email }}</td>
                    <td>{{ $komentar->isi }}</td>
                </tr>

            @empty
                <tr>
                    <td colspan="3" style="text-align: center;">Tidak ada komentar</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
