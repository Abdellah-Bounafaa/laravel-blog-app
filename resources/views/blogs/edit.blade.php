@extends('layouts.main')
@section('content')
    @php
        $action = '';
        if (isset($blog)) {
            $action = route('update', ['id' => $blog->id]);
        } else {
            $action = route('store');
        }
    @endphp

    <section class="section">
        <div class="container">
            <h3 class="text-center ">Create or update your Blog</h3>
            <form action="{{ $action }}" method="POST" class="row g-3 mt-3" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" value="{{ old('title', $blog->title ?? null) }}"
                        id="title" name="title">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="description" class="form-label">Description</label>
                    <div class="form-floating">
                        <textarea class="form-control" id="description" name="description"> {!! old('description', $blog->description ?? null) !!} </textarea>
                        @error('description')
                            <span class="text-danger">{!! $message !!}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 d-flex gap-3">
                    <div class="form-check">
                        <input class="form-check-input" @if (old('categorie_id') === '1') checked @endif value="1"
                            type="radio" name="categorie_id" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Technology
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="2"
                            @if (old('categorie_id') === '2') checked @endif name="categorie_id" id="flexRadioDefault2"
                            checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Culture
                        </label>
                    </div>
                </div>
                @error('categorie_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="col-md-12">
                    <label for="tags" class="form-label">Tags</label>
                    <input type="text" placeholder="Tags separated with ," value="{{ old('tags', $blog->tags ?? null) }}"
                        name="tags" class="form-control" id="tags">
                    @error('tags')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="formFileMultiple" class="form-label">Images </label>
                    <input class="form-control" value="{{ old('image1', $blog->image1 ?? null) }}" name="image1"
                        type="file" id="formFileMultiple">
                    @error('image1')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input class="form-control" name="image2" type="file"
                        value="{{ old('image2', $blog->image2 ?? null) }}" id="formFileMultiple">
                    @error('image2')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input class="form-control" name="image3" type="file"
                        value="{{ old('image3', $blog->image3 ?? null) }}" id="formFileMultiple">
                    @error('image3')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
