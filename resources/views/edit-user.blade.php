<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit User disini</h1>
    <a href="/users">Kembali ke daftar user</a>
    <form action="/update-user/{{ $user->id }}" method="post">
        @csrf
        @method('PUT')

        <label for="name">Nama:</label>
        <input style="width: 300px" type="text" name="name" value="{{ $user->name }}">

        <br>

        <label for="email">Email:</label>
        <input style="width: 300px" type="email" name="email" value="{{ $user->email }}">

        <br>

        <label for="password">Password:</label>
        <input style="width: 300px" type="password" name="password" placeholder="Kosongkan saja Kalau Password tidak dirubah" id="password">

        <br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>