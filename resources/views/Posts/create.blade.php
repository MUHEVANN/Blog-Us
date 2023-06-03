@extends('layout.main')
@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ url('post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputText"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Category</label>
                    <select class="form-select" name="category_id" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        @foreach ($data as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                        <option value="1">One</option>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Content</label>
                    <textarea name="content" id="editor" rows="10"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Title</label>
                    <input type="file" name="foto" class="form-control" id="exampleInputText">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
