@extends('layouts.main')
@section('content')
    <style>
        a {
            text-decoration: none
        }
    </style>
    <section class="section bg-light">
        <div class="container">
            <div class="row align-items-stretch retro-layout">
                @foreach ($blogs as $blog)
                    <div class="col-md-4">
                        <a href="{{ route('show', $blog->id) }}" class="h-entry mb-30 v-height gradient">
                            <div class="featured-img" style="background-image: url('blogs/images/{{ $blog->image1 }}');">
                            </div>
                            <div class="text">
                                <span class="date">
                                    {{ \Carbon\Carbon::parse($blog->created_at)->format('M. jS, Y') }}
                                </span>
                                <h2>{{ $blog->title }}</h2>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End retroy layout blog posts -->
    <!-- Start posts-entry -->
    <section class="section posts-entry">
        <div class="container">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Technology</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="{{ route('category', 1) }}" class="read-more">All</a></div>
            </div>
            <div class="row g-3">
                <div class="col-md-9 order-md-2">
                    <div class="row g-3">
                        @foreach ($techBlogs as $blog)
                            <div class="col-md-6">
                                <div class="blog-entry">
                                    <a href="{{ route('show', $blog->id) }}" class="img-link">
                                        <img src="{{ asset('blogs/images/' . $blog->image1) }}" alt="Image"
                                            class="img-fluid">
                                    </a>
                                    <span class="date">
                                        {{ \Carbon\Carbon::parse($blog->created_at)->format('M. jS, Y') }}</span>
                                    <h2><a href="{{ route('show', $blog->id) }}">{{ $blog->title }}</a></h2>
                                    <p>{!! Str::limit($blog->description, 60) !!}</p>
                                    <p><a href="{{ route('show', $blog->id) }}"
                                            class="btn btn-sm btn-outline-primary">Continue</a></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center align-items-center">
                    <h1>ADS</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="section posts-entry posts-entry-sm bg-light">
        <div class="container">
            <div class="row mb-4">
                @foreach ($technologyBlogs as $blog)
                    <div class="col-md-6 col-lg-3">
                        <div class="blog-entry">
                            <a href="{{ route('show', $blog->id) }}" class="img-link">
                                <img src="{{ asset('blogs/images/' . $blog->image1) }}" alt="Image" class="img-fluid">
                            </a>
                            <span class="date">
                                {{ \Carbon\Carbon::parse($blog->created_at)->format('M. jS, Y') }}</span>
                            <h2><a href="{{ route('show', $blog->id) }}">{{ $blog->title }}</a></h2>
                            <p>{!! Str::limit($blog->description, 60) !!}</p>
                            <p><a href="{{ route('show', $blog->id) }}" class="read-more">Continue</a></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="section posts-entry">
        <div class="container">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Culture</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="{{ route('category', 2) }}" class="read-more">All</a>
                </div>
                <div class="row g-3">
                    <div class="col-md-9 order-md-2">
                        <div class="row g-3">
                            @foreach ($cultureBlog as $blog)
                                <div class="col-md-6">
                                    <div class="blog-entry">
                                        <a href="{{ route('show', $blog->id) }}" class="img-link">
                                            <img src="{{ asset('blogs/images/' . $blog->image1) }}" alt="Image"
                                                class="img-fluid">
                                        </a>
                                        <span class="date">
                                            {{ \Carbon\Carbon::parse($blog->created_at)->format('M. jS, Y') }}</span>
                                        <h2><a href="{{ route('show', $blog->id) }}">{{ $blog->title }}</a></h2>
                                        <p>{!! Str::limit($blog->description, 60) !!}</p>
                                        <p><a href="{{ route('show', $blog->id) }}"
                                                class="btn btn-sm btn-outline-primary">Continue</a></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                        <h1>ADS</h1>
                    </div>
                </div>
            </div>
    </section>
    {{-- <section class="section posts-entry">
        <div class="container">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Culture</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="{{ route('category', 2) }}" class="read-more">All</a>
                </div>
            </div>

            <div class="row g-3">
                @foreach ($cultureBlog as $blog)
                    <div class="col-md-9">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="blog-entry">
                                    <a href="{{ route('show', $blog->id) }}" class="img-link">
                                        <img src="{{ asset('blogs/images/' . $blog->image1) }}" alt="Image"
                                            class="img-fluid">
                                    </a>
                                    <span class="date">
                                        {{ \Carbon\Carbon::parse($blog->created_at)->format('M. jS, Y') }}</span>
                                    <h2><a href="{{ route('show', $blog->id) }}">{{ $blog->title }}</a></h2>
                                    <p>{!! Str::limit($blog->description, 60) !!}</p>
                                    <p><a href="{{ route('show', $blog->id) }}"
                                            class="btn btn-sm btn-outline-primary">Continue</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-3 d-flex justify-content-center align-items-center">
                    <h1>ADS</h1>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="section">
        <div class="container">
            <div class="row">
                @foreach ($cultureBlogs as $blog)
                    <div class="col-lg-4 mb-4">
                        <div class="post-entry-alt">
                            <a href="{{ route('show', $blog->id) }}" class="img-link">
                                <img src="{{ asset('blogs/images/' . $blog->image1) }}" alt="Image"
                                    class="img-fluid"></a>
                            <div class="excerpt">


                                <h2><a href="{{ route('show', $blog->id) }}">{{ $blog->title }}</a></h2>
                                <div class="post-meta align-items-center text-left clearfix">
                                    <span class="date">
                                        {{ \Carbon\Carbon::parse($blog->created_at)->format('M. jS, Y') }}</span>
                                </div>
                                <p>{!! Str::limit($blog->description, 60) !!}</p>
                                <p><a href="{{ route('show', $blog->id) }}" class="read-more">Continue</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endsection
