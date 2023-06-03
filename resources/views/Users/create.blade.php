@extends('layout.main')
@section('content')
    halaman tambah
    <div class="card">
        <div class="card-body">
            <form action="{{ url('users') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" id="exampleInputText"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="exampleInputText"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputText"
                        aria-describedby="emailHelp">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
