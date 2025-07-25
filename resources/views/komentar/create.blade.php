<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h2, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Tambah Data Komentar</h1>
    <a href="{{ route('komentar.index') }}">Kembali</a>

    <form action="{{ route('komentar.store') }}" method="post">
        @csrf
        <br>
        <label for="nama">Postingan :</label>
        <select name="post_id">
            <option value="">Pilih Postingan</option>
            @foreach ($posts as $post)
                <option @selected($post->id == old('post_id')) value="{{ $post->id }}">{{ $post->judul }}</option>
            @endforeach
        </select>
        @error('post_id')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>
        <br>

        <label for="nama">User :</label>
        <select name="user_id">
            <option value="">Pilih User</option>
            @foreach ($users as $user)
                <option @selected($user->id == old('user_id')) value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        @error('user_id')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>
        <br>

        <label for="isi">isi:</label>
        <input type="text" name="isi" id="isi" value="{{ old('isi') }}">
        @error('isi')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <button type="submit">Simpan</button>
    </form>
</body>

</html>
