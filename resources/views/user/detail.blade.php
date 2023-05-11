@extends('layout.user')
@section('content')
    <div class="px-5 lg:px-[80px] w-full ">
        <p>{{ $data->viwers }}</p>
        <div class="w-[100%] h-[500px]">
            <img src="{{ asset('foto/' . $data->foto) }}" alt="" class="w-full h-full object-cover" />
        </div>
        <h1 class="font-bold text-[18px] my-3">{{ $data->title }}</h1>
        <p>{!! $data->content !!}</p>
    </div>
@endsection
