@extends('layout.main')
@section('content')
    halaman category
    <div class="card">
        <div class="card-body">
            <form action="{{ url('category') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Nama Category</label>
                    <input type="text" name="name" class="form-control" id="exampleInputText"
                        aria-describedby="emailHelp">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
