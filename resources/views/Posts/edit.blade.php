@extends('layout.main')
@section('content')
    halaman edit
    <div class="w-full h-full ">
        {{ $data->id }}
        <form action="{{ url('post/' . $data->id) }}" method="POST" enctype="multipart/form-data"
            class="w-[600px]  bg-slate-400 flex flex-col gap-y-3 p-5">
            @csrf
            @method('PUT')
            <form-group class="flex flex-col gap-2">
                <label for="title">Title</label>
                <input type="text" value="{{ $data->title }}" name="title" id=""
                    class="px-2 py-2 rounded outline-none" />
            </form-group>
            <form-group class="flex flex-col gap-2">
                <label for="foto">Category</label>
                <select value="{{ $data->category->name }}" name="category_id" id="">
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </form-group>
            <form-group class="flex flex-col gap-2">
                <label for="content">Content</label>
                <textarea name="content" id="editor" rows="10">{{ $data->content }}</textarea>
            </form-group>
            <form-group class="flex flex-col gap-2">
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="" />
            </form-group>
            <div>
                <button type="submit" class="px-6 py-2  rounded ">Submit</button>
            </div>
        </form>
    </div>
@endsection
