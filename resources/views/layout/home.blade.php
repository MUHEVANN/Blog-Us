<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.5/dist/full.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <title>Blog Us</title>
</head>

<body>
    <div class="navbar bg-base-100 lg:px-[180px] mt-5">
        <div class="flex-1">
            <a class="btn btn-ghost normal-case text-xl">BlogUs</a>
        </div>
        <div class="flex-none gap-2">
            <div class="form-control">
                <form action="{{ route('user.home') }}" method="GET">
                    @csrf
                    <input type="text" name="search" placeholder="Search"
                        class="input input-bordered w-24 md:w-auto" />
                </form>
            </div>

            @if (Route::has('login'))
                @auth
                    <div class="flex items-center">

                        <div class="dropdown dropdown-end">
                            <label tabindex="0" class="btn btn-ghost rounded-btn">{{ Auth::user()->name }} <svg
                                    class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" /></label>
                            <ul tabindex="0" class="menu dropdown-content p-2 shadow bg-base-100 rounded-box w-52 mt-4">
                                @if (Auth::user()->hasRole('admin'))
                                    <li><a href="{{ url('post') }}">dasboard</a></li>
                                @endif
                                <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </li>
                            </ul>
                        </div>

                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>

    <nav class="w-full px-5 lg:px-[300px] mb-5">
        <ul class="flex overflow-auto gap-x-2" id="navbar">
            @php
                // dd(config('app.url'));
                
                // dd(url()->current());
            @endphp
            <li
                class="p-3 hover:text-[#c84d4d] rounded whitespace-nowrap relative group {{ config('app.url') === url()->current() ? 'text-[#c84d4d] ' : '' }}">
                <a href="{{ url('/') }}">Blog Us <span
                        class=" h-[2px] absolute bg-[#c84d4d] group-hover:w-[100%]  bottom-0 left-0 transition-all ease-in-out duration-300 {{ config('app.url') === url()->current() ? 'w-[100%] ' : 'w-0' }}">&nbsp;</span></a>

            </li>
            @foreach ($category as $item)
                <li
                    class="p-3 hover:text-[#c84d4d] rounded whitespace-nowrap relative group {{ config('app.url') . '/category/' . $item->id === url()->current() ? 'text-[#c84d4d]' : '' }}">
                    <a href="{{ route('category.show', $item->id) }}">{{ $item->name }} <span
                            class=" h-[2px] absolute bg-[#c84d4d] group-hover:w-[100%]  bottom-0 left-0 transition-all ease-in-out duration-300 {{ config('app.url') . '/category/' . $item->id === url()->current() ? 'w-[100%] ' : 'w-0' }}">&nbsp;</span></a>
                </li>
                @php
                    // dd(config('app.url') . '/category' . $item->id);
                @endphp
            @endforeach
        </ul>
    </nav>
    @yield('content')
    <div
        class="w-full lg:px-[180px] px-5 shadow-md border-t md:flex-row justify-between py-[20px] flex flex-col gap-y-[20px]">
        <div>
            <h1>Blog Us</h1>
        </div>
        <div>
            <h1>About</h1>
            <p class="md:max-w-[400px] max-w-full">Saya sangat senang bisa membagikan cerita, pengalaman, dan pemikiran
                saya dengan
                Anda. Blog ini merupakan
                ruang pribadi saya di dunia maya, di mana saya bisa berbagi apa yang saya pelajari</p>
        </div>
        <div>
            <h1>Kategory</h1>
            <ul>
                @foreach ($category as $item)
                    <li><a href="{{ route('category.show', $item->id) }}">{{ $item->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="flex flex-col justify-between">
            <div>
                <h1>Contact Us</h1>
                <input type="text" class="px-2 py-2 border outline-none rounded w-full">
            </div>
            <div>
                <h1>Social Media</h1>
                <div class="flex gap-x-3">

                    <p>ig</p>
                    <p>ig</p>
                    <p>ig</p>
                    <p>ig</p>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('nav.js') }}"></script>

</html>
{{-- route('category.show', ['id' => $item->id])  --}}
