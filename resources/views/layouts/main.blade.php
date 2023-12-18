<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    @yield('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('icon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('icon.png') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <link rel="canonical" href="https://www.nlivres.com" />
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6052210973771633"
     crossorigin="anonymous"></script>
    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close">
                    <span class="icofont-close js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <nav class="site-nav">
            <div class="container">
                <div class="menu-bg-wrap">
                    <div class="site-navigation">
                        <div class="row g-0 align-items-center justify-content-between">
                            <div class="col-2">
                                <a href="{{ route('blogs') }}"
                                    class="logo m-0 float-start text-decoration-none">Nlivres</a>
                            </div>
                            <div class="col-8 text-center">
                                <div class="d-flex d-lg-none">
                                    <ul class="ms-auto d-flex text-white list-unstyled gap-3 mt-3 search-form  gap-3 ">
                                        <!-- Authentication Links -->
                                        @guest
                                            @if (Route::has('login'))
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                                </li>
                                            @endif

                                            @if (Route::has('register'))
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                        style="outline: 1px solid white;border-radius:2px;padding:.5px 2px"
                                                        href="{{ route('register') }}">{{ __('Register') }}</a>

                                                </li>
                                            @endif
                                        @else
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }}
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                        @endguest
                                    </ul>
                                </div>
                                <ul class="js-clone-nav d-none d-lg-flex gap-3 text-start site-menu mx-auto">
                                    <li class="active"><a href="{{ route('blogs') }}">Home</a></li>
                                    <li><a href="{{ route('category', 'Technology') }}">Technology</a></li>
                                    <li><a href="{{ route('category', 'Culture') }}">Culture</a></li>

                                    @auth
                                        @if (auth()->user()->role == '1')
                                            <li>
                                                <a href="{{ route('create') }}">
                                                    Create</a>
                                            </li>
                                        @endif
                                    @endauth
                                    @auth
                                        @if (auth()->user()->role == '1')
                                            <li>
                                                <a href="{{ route('messages') }}">
                                                    Messages</a>
                                            </li>
                                        @endif
                                    @endauth

                                </ul>
                            </div>
                            <div class="col-2 text-end">
                                <a href="#"
                                    class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                                    <span></span>
                                </a>

                                <ul
                                    class="ms-auto d-flex text-white list-unstyled gap-3 mt-3 search-form d-none d-lg-flex gap-3">
                                    @guest
                                        @if (Route::has('login'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                        @endif

                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    style="outline: 1px solid white;border-radius:2px;padding:.5px 2px"
                                                    href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                                role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest

                                </ul>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    @yield('content')
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="widget">
                        <h3 class="mb-4">About</h3>
                        <p>
                            Discover my personal blog website, a captivating digital haven where I share my thoughts,
                            experiences, and passions with the world. Through engaging storytelling and thoughtful
                            reflections, I invite readers to embark on a journey of self-discovery and inspiration.</p>
                    </div> <!-- /.widget -->

                </div>
                <div class="col-lg-4 ps-lg-5">
                    <div class="widget">
                        <h3 class="mb-4">Links</h3>
                        <ul class="list-unstyled float-start links">
                            <li><a href="{{ route('blogs') }}">Home</a></li>
                            <li><a href="{{ route('category', 'Technology') }}">Technology Blogs</a></li>
                            <li><a href="{{ route('category', 'Culture') }}">Culture Blogs</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget">
                        <h3>Contact Us</h3>
                        <ul class="list-unstyled social d-flex flex-column">
                            <li>Email : <b>support@nlivres.com</b> </li>
                            <li>Adresse : <b>Fez, Morocco</b></li>
                        </ul>
                    </div>
                    <div class="widget">
                        <h3>Social</h3>
                        <ul class="list-unstyled social d-flex ">
                            <li> <a href="https://github.com/Abdellah-Bounafaa" target="_blank"
                                    class="p-2 fs-5"><span class="fab fa-github"></span></a></li>
                            <li> <a href="https://www.linkedin.com/in/abdellah-bounafaa/" target="_blank"
                                    class="p-2  fs-5"><span class="fab fa-linkedin"></span></a></li>

                            <li> <a href="https://www.instagram.com/abdellah_bounafaa/" target="_blank"
                                    class="p-2  fs-5"><span class="fab fa-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="row mt-2">
                <div class="col-12 text-center">
                    <p>Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>. All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/tiny-slider.js') }}"></script>

    <script src="{{ asset('js/flatpickr.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/glightbox.min.js') }}"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script src="{{ asset('js/counter.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>

</body>

</html>
