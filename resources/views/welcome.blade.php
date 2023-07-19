@extends('layout.home')
@section('content')
    <div class="w-full px-5 lg:px-[300px]">

        @if ($searchTerm && count($post) > 0)
            @foreach ($post as $item)
                <div class="flex min-h-screen">
                    <div class=" w-[400px] h-[300px]">

                        <a href="{{ route('home.show', ['id' => $item->id]) }}">

                            <img src="{{ asset('foto/' . $item->foto) }}" alt="" class="object-cover  w-full h-full" />
                        </a>
                    </div>
                    <div class=" flex flex-col gap-y-2 ml-3">

                        <h1 class="font-bold text-[18px]"><a
                                href="{{ route('home.show', ['id' => $item->id]) }}">{{ $item->title }}</a>
                        </h1>
                        <p class="break-words text-gray-400 text-sm">{{ substr(strip_tags($item->content), 0, 50) }}...</p>

                        {{-- <p>comment : {{ $item->comment_count }}</p> --}}
                    </div>
                </div>
            @endforeach
        @elseif($searchTerm && count($post) === 0)
            <div class="min-h-screen flex justify-center">
                <h1>Not Found</h1>
            </div>
        @else
            <div class="flex  bg-[#E9F4F5] px-[30px] py-[30px] md:py-[60px]">

                <div class="flex-1 flex flex-col lg:gap-0 md:gap-3 gap-y-5 justify-between">
                    <div class="flex flex-col  md:gap-y-3">

                        <h1 class="font-bold md:text-2xl lg:text-3xl">Welcome To Blog Us,</h1>
                        <p class="max-w-[500px] text-sm font-medium ">Selamat datang di blog saya! Saya sangat senang bisa
                            membagikan
                            cerita,
                            pengalaman,
                            dan pemikiran saya
                            dengan
                            Anda. Blog ini merupakan ruang pribadi saya di dunia maya, di mana saya bisa berbagi apa yang
                            saya
                            pelajari
                        </p>
                    </div>
                    <div class="flex ">
                        <button class="text-sm px-4 lg:px-6 py-2 bg-black text-white rounded">Learn More</button>
                        <button
                            class=" text-sm px-4  lg:px-6 py-2 text-[#74d997] border-2 border-[#74d997] ml-3 rounded">Create
                            an
                            Account</button>
                    </div>
                </div>
                <div class="flex-1 md:grid place-content-center hidden">
                    <img src="{{ asset('foto/welcome.svg') }}" alt="" class=" md:w-[200px]  lg:w-[300px] h-full">
                </div>
            </div>
    </div>
    <div class="px-5 lg:px-[300px] w-full h-auto grid md:grid-cols-3">
        <div class="col-span-2 w-full ">
            <h1 class=" font-bold text-[18px] my-[30px] border-b border-[#c84d4d] text-[#c84d4d]">Latest Post</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 h-auto">
                @foreach ($post as $item)
                    <div class="col-span-1">
                        <div class="w-full h-[300px]">

                            <a href="{{ route('home.show', $item->id) }}">

                                <img src="{{ asset('foto/' . $item->foto) }}" alt=""
                                    class="object-cover w-full h-full" />
                            </a>
                        </div>
                        <h1 class="font-bold text-[18px] mt-5"><a
                                href="{{ route('home.show', $item->id) }}">{{ $item->title }}</a>
                        </h1>
                        <p class="break-words text-gray-400 text-sm">{{ substr(strip_tags($item->content), 0, 50) }}...</p>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-center my-5">

                {{ $post->links() }}
            </div>
        </div>
        <div class="md:col-span-1 md:ml-[40px] col-span-2">
            <h1 class="font-bold text-[18px] text-[#74d997] border-b border-[#74d997] my-[30px]">Populer Post</h1>
            {{-- <div class="flex flex-col "> --}}
            @foreach ($popular as $item)
                <div class="flex gap-x-2 max-h-[70px]">

                    <h1 class="font-bold">{{ $loop->iteration }}.</h1>

                    <div class="flex flex-col ">
                        <h1 class="font-bold"><a
                                href="{{ route('home.show', $item->id) }}">{{ substr($item->title, 0, 30) }}...</a>
                        </h1>
                        <p class="break-words text-gray-400 text-sm">{{ substr(strip_tags($item->content), 0, 51) }}...
                        </p>
                    </div>

                </div>
            @endforeach
            {{-- </div> --}}

        </div>
        @endif
    </div>

@endsection
