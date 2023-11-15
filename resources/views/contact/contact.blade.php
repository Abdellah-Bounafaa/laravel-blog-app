@extends('layouts.main')
@section('content')
    <div class="contact-wrap p-5 d-flex justify-content-center flex-col mb-5">
        <div class="col-md-6">
            <h3 class="p-5 text-center">Contact Us</h3>
            <form method="post" action="{{ route('send') }}" id="contactForm">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name"
                            value="{{ auth()->user()->name ? auth()->user()->name : '' }}" placeholder="First name">

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>

                            <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                value="{{ auth()->user()->email ? auth()->user()->email : '' }}"
                                aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Subject">Subject</label>
                    <input type="text" name="subject" placeholder="Enter Subject" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="Textarea">Message</label>
                    <textarea class="form-control" placeholder="Enter Your Message" name="message" id="Textarea" required></textarea>
                </div>
                <button type="button" class="btn btn-primary w-100" onclick="submitForm()">Send</button>
            </form>
        </div>
    </div>
@endsection
<script>
    function submitForm() {
        var formData = new FormData(document.getElementById('contactForm'));

        $.ajax({
            type: 'POST',
            url: '{{ route('send') }}',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // On success, show a SweetAlert notification and redirect
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Message sent successfully!',
                }).then(() => {
                    window.location.href = '/';
                });
            },
            error: function(error) {
                // On error, show a SweetAlert error notification
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error sending message. Please try again.',
                });
                console.error('Error:', error);
            }
        });
    }
</script>
