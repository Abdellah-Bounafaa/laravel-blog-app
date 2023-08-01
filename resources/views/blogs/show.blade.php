@extends('layouts.main')
@section('content')
    <style>
        a {
            text-decoration: none
        }
    </style>
    <div class="site-cover site-cover-sm same-height overlay single-page"
        style="background-image: url('https://cdn.pixabay.com/photo/2016/10/12/19/50/matrix-1735640_1280.jpg');">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-6">
                    <div class="post-entry text-center">
                        <h1 class="mb-4">{{ $blog->title }}</h1>
                        <div class="post-meta align-items-center text-center">
                            <span class="d-inline-block mt-1">By <b>Abdellah BOUNAFAA</b></span>
                            <span>&nbsp;-&nbsp;
                                {{ \Carbon\Carbon::parse($blog->created_at)->format('M. jS, Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">

            <div class="row blog-entries element-animate">

                <div class="col-md-12 col-lg-8 main-content">

                    <div class="post-content-body">
                        <div class="row my-4">

                            <div class="mb-3"
                                style="background-image: url('{{ asset('blogs/images/' . $blog->image1) }}');background-size: cover;background-repeat: no-repeat;background-position: center;width: 100%;height: 500px; border-radius: 10px;">
                            </div>
                            @if ($blog->image2 !== null && $blog->image3 !== null)
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <div class="col-md-6 mb-4">
                                        <img src="{{ asset('blogs/images/' . $blog->image2) }}" alt="Image placeholder"
                                            class="img-fluid rounded">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <img src="{{ asset('blogs/images/' . $blog->image3) }}" alt="Image placeholder"
                                            class="img-fluid rounded">
                                    </div>
                                </div>
                            @endif
                        </div>
                        <p>{!! $blog->description !!}</p>
                    </div>


                    <div class="pt-5">
                        <p>
                        <p>Categorie: <b>{{ $blog->category->title }}
                            </b></p>
                        @php
                            $tagsArray = explode(',', $blog->tags);
                        @endphp
                        Tags:
                        @foreach ($tagsArray as $tag)
                            <span><b>#{{ $tag }}</b></span>,
                        @endforeach
                        </p>
                        @auth

                            @if (auth()->user()->role == '1')
                                <div class="d-flex gap-2 align-items-center">
                                    <a href="{{ route('edit', $blog->id) }}" class="btn btn-success mr-2">Update</a>
                                    <form action="{{ route('delete', $blog->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            @endif
                        @endauth

                    </div>

                </div>
                <!-- END main-content -->
                <div class="col-md-12 col-lg-4 sidebar">
                    <!-- END sidebar-box -->
                    <div class="sidebar-box p-2">
                        <div class="bio text-center">
                            <img src="{{ url('me/DSC_0045.jpg') }}" alt="Image Placeholder" class="img-fluid mb-3">
                            <div class="bio-body">
                                <h2>Abdellah Bounafaa</h2>
                                <p class="mb-4"><i>

                                        I am a skilled Full-Stack developer with expertise in both front-end and back-end
                                        technologies. I enjoy creating innovative web applications and optimizing user
                                        experiences through seamless integration of design and functionality.</i></p>
                                <p class="social">
                                    <a href="https://github.com/Abdellah-Bounafaa" class="p-2"><span
                                            class="fab fa-github"></span></a>
                                    <a href="https://www.linkedin.com/in/abdellah-bounafaa/" class="p-2"><span
                                            class="fab fa-linkedin"></span></a>
                                    <a href="#" class="p-2"><span class="fab fa-instagram"></span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box p-2">
                        <h3 class="heading">Popular Blogs</h3>
                        <div class="post-entry-sidebar">
                            <ul>
                                @foreach ($blogs as $popularBlog)
                                    <li>
                                        <a href="">
                                            <img src="{{ asset('blogs/images/' . $popularBlog->image1) }}"
                                                alt="Image placeholder" class="me-4 rounded">
                                            <div class="text">
                                                <h4>{{ $popularBlog->title }}</h4>
                                                <div class="post-meta">
                                                    <span class="mr-2">
                                                        {{ \Carbon\Carbon::parse($popularBlog->created_at)->format('M. jS, Y') }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- END sidebar-box -->
                </div>
                <!-- END sidebar -->

            </div>
        </div>
    </section>


    <!-- Start posts-entry -->
    <section class="section posts-entry posts-entry-sm bg-light">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-uppercase text-black">More blogs</div>
            </div>
            <div class="row">
                @foreach ($randomBlogs as $blog)
                    <div class="col-md-6 col-lg-3">
                        <div class="blog-entry">
                            <a href="{{ route('show', $blog->id) }}" class="d-block">
                                <img src="{{ asset('blogs/images/' . $blog->image1) }}" alt="Image"
                                    class="img-fluid rounded-1">
                            </a>
                            <span class="date">
                                {{ \Carbon\Carbon::parse($blog->created_at)->format('M. jS, Y') }}
                            </span>
                            <h2><a href="{{ route('show', $blog->id) }}">{{ $blog->title }}</a></h2>
                            <p>{!! Str::limit($blog->description, 30) !!}</p>
                            <p><a href="{{ route('show', $blog->id) }}" class="read-more">Continue</a></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>
@endsection
