<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table style="width: 100%;" border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                {{-- <th>Password</th> --}}
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataUser as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    {{-- <td>{{ $item->password }}</td> --}}
                    <td>
                        <a href="{{ route('users.edit', $item->id) }}">Edit</a> |
                        <form style="display:inline" action="{{ route('users.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus??')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('users.create') }}">Tambah User</a>
</body>

</html>
