<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @auth
        <h1>Welcome, {{ auth()->user()->name }}!</h1>

        <form action="{{ route('doLogout') }}" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @endauth

    @guest
        <h2>Login DULU!!!</h2>
        <a href="{{ route('login') }}">Login</a>
        <br>
        <a href="{{ route('register') }}">Register</a>
    @endguest

    @auth
        <br>
        <a href="{{ route('posts.index') }}">Posts</a>
        <br>
        <a href="{{ route('komentar.index') }}">Komentar</a>
        <br>
        <a href="{{ route('users.index') }}">Users</a>
    @endauth
</body>

</html>
