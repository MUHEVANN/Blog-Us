@extends('layout.home')
@section('content')
    <div class="px-5 lg:px-[300px] my-5">
        <h1>{{ $category_id->name }}</h1>
        <h1 class="font-bold tracking-[0.15rem] border-b border-[#c84d4d] text-[#c84d4d] py-3 ">Latest Post</h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-3 px-5 w-full h-auto lg:px-[300px] ">

        @foreach ($data as $key => $item)
            @if ($key == 0)
                <div class="col-span-1 relative w-full h-[400px]">
                    <img src="{{ asset('foto/' . $item->foto) }}" alt="" class="object-cover h-full w-full" />
                    <div class=" absolute bottom-[20%] z-[10] left-5">
                        <h1 class="font-bold text-white text-[18px] hover:underline"><a
                                href="{{ route('home.show', $item->id) }}" class="">{{ $item->title }}</a>
                        </h1>
                        {{-- <button class="text-white px-6 py-2 rounded bg-red-500">Baca</button> --}}

                    </div>
                    <div class="w-full h-full absolute bg-black/30 top-0"></div>
                </div>
            @endif
        @endforeach
        <div class="col-span-2 w-full h-full grid grid-cols-1 gap-y-2 md:grid-cols-2  place-content-between">
            @foreach ($data as $key => $item)
                @if ($key != 0)
                    <div class="grid grid-cols-2 gap-3">
                        <div class="cols-span-1">
                            <a href="{{ route('home.show', $item->id) }}"><img src="{{ asset('foto/' . $item->foto) }}"
                                    alt="" class="w-full h-[100px]"></a>
                        </div>
                        {{-- <img src="{{ asset('foto/' . $item->foto) }}" alt="" class="w-[80px] h-[80px]"> --}}
                        <h1 class="cols-span-1 w-full font-bold hover:underline"><a
                                href="{{ route('home.show', $item->id) }}">{{ $item->title }}</a></h1>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="px-5 lg:px-[300px] my-5 mt-[40px]">

        <h1 class="font-bold tracking-[0.15rem] border-b border-[#74d997] py-3  text-[#4dc878]">Rekomende For You
        </h1>
    </div>
    <div class="grid md:grid-cols-2 grid-cols-1 lg:grid-cols-3 px-5 h-auto mb-[30px] lg:px-[300px] gap-3">

        @foreach ($popular as $item)
            <div class="w-full h-full">
                <a href="{{ route('home.show', $item->id) }}"><img src="{{ asset('foto/' . $item->foto) }}" alt=""
                        class="w-full h-[300px]"></a>

                <a href="{{ route('home.show', $item->id) }}" class="font-bold hover:underline ">{{ $item->title }}</a>
            </div>
        @endforeach
    </div>
@endsection
