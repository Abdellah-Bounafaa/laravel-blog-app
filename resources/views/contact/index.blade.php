@extends('layouts.main')
@section('title')
    nlivres - Contact
@endsection
@section('meta')
    <meta name="description"
        content="Unlock the world of programming and professional insights on my website. Dive into a realm of code, career tips, and tech knowledge.">
@endsection
@section('content')
    <section class="section bg-light">
        <div class="container">
            <h3 class="text-center">Messages</h3>
            @if ($messages->count() <= 0)
                <h3 class="text-center mt-5">No messages yet!!</h3>
            @else
                <table class="table table-striped mt-3">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                            <tr>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->subject }}</td>
                                <td>{{ $message->message }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </section>
@endsection
