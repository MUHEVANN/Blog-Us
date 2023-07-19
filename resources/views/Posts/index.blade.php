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
                            <button type="button" class="btn btn-primary" data-id="{{ $item->id }}"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $item->id }}">
                                Hapus
                            </button>
                            <div class="modal fade" id="staticBackdrop{{ $item->id }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah yakin ingin dihapus?{{ $item->id }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

                                            <form action="{{ url('post/' . $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-primary" type="submit">Hapus
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
