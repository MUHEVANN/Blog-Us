@extends('layout.main')
@section('content')
    halaman edit
    <div class="card">
        <div class="card-body">
            <form action="{{ url('users/' . $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Nama</label>
                    <input type="text" value="{{ $data->name }}" name="name" class="form-control" id="exampleInputText"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Email</label>
                    <input type="text" value="{{ $data->email }}" name="email" class="form-control"
                        id="exampleInputText" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">New Password</label>
                    <input type="password" name="new_password" class="form-control" id="exampleInputText"
                        aria-describedby="emailHelp">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
