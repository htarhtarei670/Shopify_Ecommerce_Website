@extends('users.layouts.main')

@section('content')
    <div class="container map-area">
        <div class="col-12">
            <iframe class="map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61918.75891797909!2d98.16163953851176!3d14.081756124354714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e50bc719b6f191%3A0xa7c45ea8fdf2bb4a!2sDawei!5e0!3m2!1sen!2smm!4v1679995742173!5m2!1sen!2smm"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <section class="contact-us">
        <div class="container">
            <h4 class="">Get In Touch</h4>
            <div class="row">
                <div class="col-8">
                    <form action="{{ route('user#contactDataStore') }}" method="post">
                        @csrf
                        <div class="row input-area">
                            <div class="col-12">
                                <textarea name="message" id="" cols="30" rows="10" placeholder="Message.." class="col-12"></textarea>
                                @error('message')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <input type="text" name="name" id="" placeholder="Your Name..." >
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <input type="email" name="email" id="" placeholder="Your Email...">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button class="show-btn col-2 ms-3" type="submit">Send</button>
                        </div>
                    </form>
                </div>
                <div class="offset-1 col-3 mt-3">
                    <div class="location">
                        <div class="fs-1"><i class="fa-solid fa-map-location fs-1"></i></div>
                        <div class="location-detail">
                            <div>Dawei,Myanmar</div>
                            <small class=" text-muted">No.04,ThiMarDi Rood</small>
                        </div>
                    </div>
                    <div class="location">
                       <div class="fs-1"> <i class="fa-solid fa-phone-volume fs-1"></i></div>
                        <div class="location-detail">
                            <div>+95 9 786 507 670</div>
                            <small class=" text-muted">Mon to Fri 9am to 6pm</small>
                        </div>
                    </div>
                    <div class="location">
                        <div class="fs-1"><i class="fa-regular fa-envelope"></i></div>
                        <div class="location-detail">
                            <div>irisfleur670@gmail.com</div>
                            <small class=" text-muted">Send us your query anytime!</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 offset-8 col-4">
             @if (session('sendSuccess'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    <i class="fa-regular fa-circle-check pe-2"></i> {{ session('sendSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </section>
@endsection
