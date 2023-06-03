@extends('layout.main')
@section('content')
    <table class="table table-sm">
        <caption>List of users</caption>
        <thead>
            <tr>
                <th>no</th>
                <th>name</th>
                <th>email</th>
                <th>password</th>
                <th>Dibuat</th>
                <th>Aksi</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($userRoles as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->password }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <div class="d-flex align-items-center">

                            <a class="" href="{{ url('users/' . $item->id . '/edit') }}">Edit
                            </a>
                            <form action="{{ url('users/' . $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class=" btn btn-primary" type="submit">Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
