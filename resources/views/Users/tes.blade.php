<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- font -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap"
      rel="stylesheet"
    /> -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <!-- /font -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <style>
        * {
            /* font-family: "Montserrat", sans-serif; */
            font-family: "Poppins", sans-serif;
        }

        .search {
            top: 7px;
            right: 20px;
        }

        .search:focus {
            display: none;
        }

        .list-a {
            color: black;
            /* Warna teks asli */
            transition: transform 0.2s ease-in-out;
            /* Transisi warna selama 0.5 detik */
        }

        .list-a:hover {
            transform: translateX(10px);
        }

        .img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .tgl {
            font-size: 12px;
        }

        .top {
            min-width: 6%;
        }

        .he {
            height: 40vh;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container d-flex">
            <a class="navbar-brand" href="#">Blog Us </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto nav-links">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                    <li class="nav-item dropdown d-lg-none">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($category as $item)
                                <li><a class="dropdown-item" href="#">{{ $item->name }}</a></li>
                            @endforeach

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <form action="" class="position-relative my-3">
                <div class="">
                    <label class="position-absolute search"><span class="material-symbols-outlined">search </span>
                    </label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="search" />
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex align-items-center w-100 he justify-content-center">
                <div>
                    <h1 class="fw-bold fs-1 text-uppercase text-center">
                        Home
                    </h1>
                    <p>Selamat datang diweb blog pribadai saya , semoga kalian menikmati konten yang telah saya buat</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <!-- aside -->
            <div class="col-lg-4 d-none d-lg-block">
                <div class="d-flex flex-column row-gap-5">
                    <!-- category -->
                    <div class="p-4 border d-flex flex-column row-gap-2 bg-light">
                        <h1 class="fs-3 fw-bold">Category</h1>
                        <ul class="list-unstyled fw-medium">
                            @foreach ($category as $item)
                                <li class="py-2 border-bottom">
                                    <div class="list-a">
                                        <a href="{{ route('category.show', $item->id) }}"
                                            class="text-decoration-none text-dark">{{ $item->name }}</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- top post -->
                    <div class="d-flex flex-column row-gap-2 border bg-light p-4">
                        <h1 class="fs-3 fw-bold">Top post</h1>
                        @foreach ($popular as $pop)
                            <div class="d-flex py-2 gap-4 align-items-center w-100">
                                <h1 class="top">{{ $loop->iteration }}</h1>
                                <span class="fw-medium">
                                    {{ substr($pop->title, 0, 70) }}...
                                </span>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <!-- aside -->
            <!-- main -->
            <div class="col-lg-8 row">
                <!-- card -->
                @foreach ($post as $item)
                    <div class="col-lg-6">
                        <div class="w-100">
                            <img src={{ asset('foto/' . $item->foto) }} alt="" class="img" />
                        </div>
                        <div>
                            <a href="{{ route('home.show', ['id' => $item->id]) }}"
                                class="fw-semibold fs-5 text-decoration-none text-dark">{{ $item->title }}</a>
                        </div>
                        <span class="tgl">{{ $item->created_at->format('j F Y') }}</span>
                        <p class="">
                            {{ substr(strip_tags($item->content), 0, 100) }}...
                        </p>
                    </div>
                @endforeach

                <!-- card -->
            </div>
            <!-- main -->
        </div>
    </div>
    <div class="bg-light">
        <div class="container mt-5 py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-4 d-flex flex-column justify-content-between">
                    <h1 class="fs-3 fw-bold">Blog Us</h1>
                    <span>&copy; Copyright Mei 2023</span>
                </div>
                <div class="col-lg-4 d-flex row-gap-4 flex-column">
                    <h1 class="fs-3 fw-bold">Kategory</h1>
                    <ul class="col-lg-3 row list-unstyled">
                        <li class="col-lg-6">
                            <a href="" class="text-decoration-none text-dark">sport</a>
                        </li>
                        <li class="col-lg-6">
                            <a href="" class="text-decoration-none text-dark">sport</a>
                        </li>
                        <li class="col-lg-6">
                            <a href="" class="text-decoration-none text-dark">sport</a>
                        </li>
                        <li class="col-lg-6">
                            <a href="" class="text-decoration-none text-dark">sport</a>
                        </li>
                        <li class="col-lg-6">
                            <a href="" class="text-decoration-none text-dark">sport</a>
                        </li>
                        <li class="col-lg-6">
                            <a href="" class="text-decoration-none text-dark">sport</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 d-flex row-gap-4 flex-column">
                    <h1 class="fs-3 fw-bold">Contact Us</h1>
                    <div class="d-flex row-gap-3 flex-column">
                        <span>jl.pemuda,klaten Lorem ipsum dolor sit amet.</span>
                        <div class="d-flex flex-column">
                            <a href="">evan@gmail.com</a>
                            <a href="">+089282991</a>
                        </div>
                        <a href="">igigig</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
