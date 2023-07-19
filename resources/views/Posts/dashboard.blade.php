@extends('layout.main')
@section('content')
    <div class="row">

        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-center text-primary">
                        User
                    </div>
                    <div class="card-content text-center">
                        <h1 class=" text-primary">{{ $UserCount }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-center text-danger">
                        Post
                    </div>
                    <div class="card-content text-center ">
                        <h1 class="text-danger">{{ $PostCount }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="card-title text-center">
                Popular Post
            </div>
            <div class="card-content ">
                <table class="table">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Judul</td>
                            <td>Content</td>
                            <td>Viwers</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($populars as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{!! substr($item->content, 0, 100) !!}...</td>
                                <td>{{ $item->viwers }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
