@extends('layout.user')
@section('content')
    <div class="px-5 lg:px-[80px] my-5">

        <h1 class="font-bold tracking-[0.15rem] border-b border-[#c84d4d] text-[#c84d4d] py-3 ">Latest Post</h1>
    </div>
    {{-- @foreach ($post as $item)
        <h1>{{ $item->title }}</h1>
    @endforeach --}}
    <div class="grid grid-cols-3 gap-x-3 px-5 w-full h-[250px] lg:px-[80px] ">

        @foreach ($data as $key => $item)
            @if ($key == 0)
                <div class="col-span-1 relative w-full h-full">
                    <img src="{{ asset('foto/' . $item->foto) }}" alt="" class="object-cover h-full w-full" />
                    <div class=" absolute bottom-[20%] z-[10] left-5">
                        <h1 class="font-bold text-white text-[18px] hover:underline"><a
                                href="{{ route('posts.show', ['id' => $item->id]) }}" class="">{{ $item->title }}</a>
                        </h1>
                        {{-- <button class="text-white px-6 py-2 rounded bg-red-500">Baca</button> --}}

                    </div>
                    <div class="w-full h-full absolute bg-black/30 top-0"></div>
                </div>
            @endif
        @endforeach
        <div class="col-span-2 w-full h-full grid grid-cols-2 place-content-between">
            @foreach ($data as $key => $item)
                @if ($key != 0)
                    <div class="flex gap-x-3">

                        <img src="{{ asset('foto/' . $item->foto) }}" alt="" class="w-[80px] h-[80px]">
                        <h1 class="font-bold hover:underline"><a
                                href="{{ route('posts.show', ['id' => $item->id]) }}">{{ $item->title }}</a></h1>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="px-5 lg:px-[80px] my-5 mt-[40px]">

        <h1 class="font-bold tracking-[0.15rem] border-b border-[#74d997] py-3  text-[#4dc878]">Rekomende For You
        </h1>
    </div>
    <div class="grid grid-cols-3 px-5 h-[500px] lg:px-[80px] gap-3">

        @foreach ($popular as $item)
            <div class="w-full h-full">
                <img src="{{ asset('foto/' . $item->foto) }}" alt="" class="w-full h-[300px]">
                <h1 class="font-bold hover:underline h-auto">{{ $item->title }}</h1>
            </div>
        @endforeach
    </div>
@endsection
