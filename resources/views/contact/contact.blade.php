@extends('layouts.main')
@section('content')
    <div class="contact-wrap p-5 d-flex justify-content-center flex-col  mb-5">
        <div class="col-md-6">
            <h3 class="p-5 text-center">Contact Us</h3>
            <form method="post" action="{{ route('send') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="exampleInputEmail1">Name</label>
                        @auth
                            <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}"
                                placeholder="First name" disabled>
                        @else
                            <input type="text" class="form-control" name="name" placeholder="First name">
                        @endauth
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">

                            <label for="exampleInputEmail1">Email address</label>
                            @auth <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                    value="{{ auth()->user()->email }}" aria-describedby="emailHelp" placeholder="Enter email"
                                    disabled>
                            @else
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                            @endauth

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Subject">Subject</label>
                    <input type="text" name="subject" placeholder="Enter Subject" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="Textarea">Message</label>
                    <textarea class="form-control" placeholder="Enter Your Message" name="message" id="Textarea"required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Send</button>
            </form>
        </div>
    </div>
@endsection
