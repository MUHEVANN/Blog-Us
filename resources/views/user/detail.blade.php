@extends('layout.user')
@section('content')
    <div class="px-5 lg:px-[80px] w-full ">
        <p>{{ $data->viwers }}</p>
        <div class="w-[100%] h-[500px]">
            <img src="{{ asset('foto/' . $data->foto) }}" alt="" class="w-full h-full object-cover" />
        </div>
        <h1 class="font-bold text-[18px] my-3">{{ $data->title }}</h1>
        <p>{!! $data->content !!}</p>
        <article>
            {!! $data->content !!}
        </article>
        <form action="{{ url('comment') }}" method="post" class="flex flex-col xl:w-[50%]">
            @csrf
            <input type="hidden" name="post_id" value="{{ $data->id }}">
            <label for="konten" class="font-bold text-[36px]">comment</label>
            {{-- <input type="textarea" name="konten"> --}}
            <textarea name="konten" cols="30" rows="10"
                class="bg-slate-900 rounded-lg resize-none border-0 outline-none focus:outline-sky-600 my-2"></textarea>
            <button type="submit"
                class="px-4 py-2 bg-sky-700 text-white rounded-lg flex-none w-36 mt-2 focus:ring focus:outline-sky-400 focus:ring-sky-400 focus:ring-offset-1">Submit</button>
        </form>
        <div class="flex flex-col xl:w-[50%] bg-slate-900 my-6 px-6 pt-2 pb-4 rounded-lg">
            @foreach ($comment as $item)
                <div class="flex flex-row justify-between mt-4">
                    <p class="text-medium text-lg">Nama orang komen</p>
                    <p class="flex-none">{{ $item->created_at }}</p>
                </div>
                <p>{{ $item->konten }}</p>
                <hr class="border-1 border-sky-800/60 my-3">
                <div x-data="{ open: false }" class="flex flex-col">
                    <button @click="open = true">Edit</button>
                    <form action="" method=PUT>
                        <span x-show="open" x-trap="open" class="flex flex-col">
                            <textarea name="updatekomen"
                                class="bg-slate-900 rounded-lg resize-none border-0 outline-none focus:outline-sky-600 my-2">{{ $item->konten }}</textarea>
                            <div class="flex flex-row gap-4">
                                <button type="submit" class="bg-sky-600 text-white px-6 py-2 rounded-lg">Simpan</button>
                                <a @click="open = false"
                                    class="cursor-pointer bg-sky-900 text-white px-6 py-2 rounded-lg">Batal</a>
                            </div>
                        </span>
                    </form>
                </div>
            @endforeach

        </div>
        <div x-data="{ open: false }">
            <button @click="open = true">Open Dialog</button>

            <span x-show="open" x-trap="open">
                <p>...</p>

                <input type="text" placeholder="Some input...">

                <input type="text" placeholder="Some other input...">

                <button @click="open = false">Close Dialog</button>
            </span>
        </div>
        <!-- Alpine Plugins -->
        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>

        <!-- Alpine Core -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script>
            import Alpine from 'alpinejs'
            import focus from '@alpinejs/focus'

            Alpine.plugin(focus)
        </script>
    </div>
@endsection
{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <img src="{{ asset('foto/' . $data->foto) }}" alt="" />
    <form action="{{ url('comment') }}" method="post">
        @csrf
        <input type="hidden" name="post_id" value="{{ $data->id }}">
        <label for="konten">comment</label>
        <input type="text" name="konten">
        <button type="submit">Submit</button>
    </form>
    @foreach ($comment as $index => $item)
        {{ $item->konten }}
        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#exampleModal{{ $index }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
            </svg>
        </button>
        <form action="{{ url('comment/' . $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="bg-red-100 hover:bg-red-200 p-3" type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
            </button>
        </form>
        <div class="modal fade" id="exampleModal{{ $index }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('comment/' . $item->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input name="konten" type="text" value="{{ $item->konten }}">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach



    <!-- Modal -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html> --}}
