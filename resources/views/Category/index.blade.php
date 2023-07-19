@extends('layout.main')
@section('content')
    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}

    <h1>halaman post content</h1>

    <table class="table w-full">
        <!-- head -->
        <thead class="">
            <tr>
                <th>no</th>
                <th>Nama Category</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <!-- row 1 -->
            @foreach ($data as $item)
                <tr class="text-capitalize">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}
                    </td>


                    <td>
                        <div class="d-flex align-items-center">

                            <a class="bg-blue-100 hover:bg-blue-200 p-3 "
                                href="{{ url('category/' . $item->id . '/edit') }}">Edit
                            </a>

                            <button type="button" class="btn btn-primary" data-id="{{ $item->id }}" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop{{ $item->id }}">
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

                                            <form action="{{ url('category/' . $item->id) }}" method="POST">
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
