@extends('layouts.main')
@section('title')
    nlivres - About
@endsection
@section('meta')
    <meta name="description"
        content="Unlock the world of programming and professional insights on my website. Dive into a realm of code, career tips, and tech knowledge.">
@endsection
@section('content')
    <!-- Main Content -->
    <div class="container pt-5">
        <div class="row">
            <h1 class="text-center">About us</h1>
            <div class="col-md-8 pt-3 offset-md-2">
                <h2 class="mb-4">About Me</h2>
                <p>I'm not just a programmer; I'm a storyteller of code, a seeker of knowledge, and a passionate advocate
                    for the art and science of programming. My journey in the tech world has been a fascinating ride, filled
                    with challenges, triumphs, and an unquenchable thirst for learning.</p>

                <h2 class="mb-4">Why nlivres.com?</h2>
                <p>nlivres.com is more than just a digital space; it's a manifestation of my love for programming and a
                    desire to connect with a community of like-minded individuals. Here, I aim to create a haven where
                    programming enthusiasts, professionals, and curious minds can find inspiration, guidance, and a sense of
                    camaraderie.</p>

                <h2 class="mb-4">What You'll Discover:</h2>
                <ul>
                    <li><strong>Insightful Programming Journeys:</strong> Join me as I share personal experiences, lessons
                        learned, and the occasional "Aha!" moments in my coding adventures.</li>
                    <li><strong>In-Depth Tutorials:</strong> Learn and grow with hands-on tutorials covering various
                        programming languages, frameworks, and best practices.</li>
                    <li><strong>Professional Perspectives:</strong> Navigate the dynamic landscape of the tech industry with
                        articles offering insights into career development, industry trends, and the ever-evolving world of
                        technology.</li>
                </ul>

                <!-- Add more content sections as needed -->

                <h2 class="mb-4">Let's Connect:</h2>
                <p>I believe in the power of community, and I want nlivres.com to be a space for interaction and
                    collaboration.</p>
                <p>Feel free to share your thoughts in the comments section. Let's build a community where knowledge flows
                    freely.</p>

                <h2 class="mb-4">Contact:</h2>
                <p>Have a question or just want to say hello? Reach us at <strong><a
                            href="mailto:support@nlivres.com">support@nlivres.com</a></strong>.Or visit <strong><a
                            href="{{ route('contact') }}">Contact</a> </strong>page and send us a message</p>
            </div>
        </div>
    </div>
@endsection
