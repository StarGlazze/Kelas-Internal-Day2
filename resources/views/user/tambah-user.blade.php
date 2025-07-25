<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Tambah User Disini</h1>
    <a href="{{ route('users.index') }}">Kembali ke daftar user</a>

    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        @error('password')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>

</html>
