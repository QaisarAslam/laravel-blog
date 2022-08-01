@extends('frontend.layouts.master')
@section('title')
Contact Us
@endsection
@section('header')
@include('frontend.contact_header')
@endsection
@section('content')
<!-- Main Content Start-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="my-5">
                    <form accept-charset="utf-8" id="contactForm">
                    	@csrf
                        <div class="form-floating">
                            <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name..."  />
                            <label for="name">Name</label>
                            <small class="is-invalid" id="name_help" name="name_help"></small>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="email" name="email" type="email" placeholder="Enter your email..."  />
                            <label for="email">Email address</label>
                            <small class="is-invalid" id="email_help" name="email_help"></small>
                        </div>
                        {{-- <div class="form-floating">
                            <input class="form-control" id="phone" type="tel" placeholder="Enter your phone number..."  />
                            <label for="phone">Phone Number</label>
                        </div> --}}
                        <div class="form-floating">
                            <textarea class="form-control" id="message" name="message" placeholder="Enter your message here..." style="height: 12rem" ></textarea>
                            <label for="message">Message</label>
                            <small class="is-invalid" id="message_help" name="message_help"></small>
                        </div>
                        <br />
                        <button class="btn btn-primary" type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main Content End-->
@endsection
@section('scripts')
<script src="{{ asset('frontend/partials/contact.js') }}" type="text/javascript"></script>
@endsection