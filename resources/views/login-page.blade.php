<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Login</h3>
    <form action="{{ route('doPost') }}" method="post">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Login</button>
        <br>
    </form>
</body>
</html>