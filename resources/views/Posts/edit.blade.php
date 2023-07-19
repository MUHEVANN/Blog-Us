@extends('layout.main')
@section('content')
    halaman edit
    <div class="card">
        <div class="card-body">

            <form action="{{ url('post/' . $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Title</label>
                    <input type="text" value="{{ $data->title }}" name="title" class="form-control"
                        id="exampleInputText" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Category</label>
                    <select class="form-select" name="category_id" aria-label="Default select example">
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}"
                                {{ $item->name === $data->category->name ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Content</label>
                    <textarea name="content" id="editor" rows="10">{{ $data->content }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control" id="exampleInputText">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
