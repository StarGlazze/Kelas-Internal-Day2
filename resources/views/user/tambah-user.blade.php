<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="container mt-5" style="max-width: 500px">
    <h2 class="mb-4">Tambah User Disini</h2>
    <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Kembali ke daftar user</a>

    <form action="{{ route('users.store') }}" method="post" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
            @error('email')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" id="password" class="form-control">
            @error('password')
                <div class="text-danger-small">{{ $message }}</div>
            @enderror
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
