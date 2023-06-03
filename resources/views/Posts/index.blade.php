@extends('layout.main')
@section('content')
    <table class="table table-sm">
        <caption>List of posts</caption>
        <thead>
            <tr>
                <th>no</th>
                <th>Foto</th>
                <th>Title</th>
                <th>Category</th>
                <th>waktu</th>
                <th>Aksi</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="w-25 h-25"><img src="{{ asset('foto/' . $item->foto) }}" alt="image" class="w-50 h-50" />
                    </td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <div class="d-flex align-items-center">

                            <a class="" href="{{ url('post/' . $item->id . '/edit') }}">Edit
                            </a>
                            <form action="{{ url('post/' . $item->id) }}" method="POST">
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
