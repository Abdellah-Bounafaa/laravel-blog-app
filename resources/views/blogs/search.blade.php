@extends('layouts.main')
@section('content')
    <style>
        a {
            text-decoration: none
        }
    </style>
    <section class="section posts-entry posts-entry-sm bg-light">
        <div class="container">
            <div class="row mb-4">
                @if ($blogs->count() > 0)
                    <h3>Results for <b>{{ $title }}</b></h3>
                    <span>{{ $blogs->count() }} blogs available</span>
                    @foreach ($blogs as $blog)
                        <div class="col-md-6 col-lg-3 pt-5">
                            <div class="blog-entry">
                                <a href="{{ route('show', $blog->id) }}" class="img-link">
                                    <img src="{{ asset('blogs/images/' . $blog->image1) }}" alt="Image" class="img-fluid">
                                </a>
                                <span class="date">
                                    {{ \Carbon\Carbon::parse($blog->created_at)->format('M. jS, Y') }}</span>
                                <h2><a href="{{ route('show', $blog->id) }}">{{ $blog->title }}</a></h2>
                                <p>{!! Str::limit($blog->description, 60) !!}</p>
                                <p><a href="{{ route('show', $blog->id) }}" class="read-more">Continue Reading</a></p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div style="height: 300px" class="d-flex justify-content-center align-items-center">
                        <h1>No Blogs for {{ $title }}</h1>
                    </div>
                @endif

            </div>
        </div>
    </section>
@endsection
