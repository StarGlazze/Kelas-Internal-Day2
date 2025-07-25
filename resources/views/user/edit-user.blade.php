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
    <a href="{{ route('users.index') }}">Kembali ke daftar user</a>
    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')

        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}">
        @error('name')
            <div style="color: red;">{{ $message }}</div>
            
        @enderror
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}">
        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Kosongkan jika tidak diubah">
        @error('password')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>

        <button type="submit">Simpan</button>
    </form>
</body>

</html>
