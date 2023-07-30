@extends('layouts.main')
@section('content')
    <style>
        a {
            text-decoration: none
        }
    </style>
    <div class="section search-result-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading">Category: {{ $category->title }}</div>
                </div>
            </div>
            <div class="row posts-entry">
                <div class="col-lg-8">
                    @foreach ($blogs as $blog)
                        <div class="blog-entry d-flex blog-entry-search-item">
                            <a href="{{ route('show', $blog->id) }}" class="img-link me-4">
                                <img src="{{ asset('/blogs/images/' . $blog->image1) }}" alt="Image" class="img-fluid">
                            </a>
                            <div>
                                <span class="date"> {{ \Carbon\Carbon::parse($blog->created_at)->format('M. jS, Y') }}
                                    &bullet; <a href="#">{{ $blog->category->title }}</a></span>
                                <h2><a href="{{ route('show', $blog->id) }}">{{ $blog->title }}</a></h2>
                                <p>{!! Str::limit($blog->description, 60) !!}</p>
                                <p><a href="{{ route('show', $blog->id) }}"
                                        class="btn btn-sm btn-outline-primary text-decoration-none">Read
                                        More</a></p>
                            </div>
                        </div>
                    @endforeach

                    {{ $blogs->links('pagination.paginate') }}


                </div>

                <div class="col-lg-4 sidebar">

                    <div class="sidebar-box search-form-wrap mb-4">
                        <form action="{{ route('search') }}" method="GET" class="sidebar-search-form">
                            <span class="bi-search"></span>
                            <input type="text" class="form-control" id="s"
                                placeholder="Type a keyword and hit enter" name="title">
                        </form>

                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box d-flex justify-content-center align-items-center">
                        <h1>ADS</h1>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box d-flex justify-content-center align-items-center">
                        <h1>ADS</h1>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box d-flex justify-content-center align-items-center">
                        <h1>ADS</h1>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
