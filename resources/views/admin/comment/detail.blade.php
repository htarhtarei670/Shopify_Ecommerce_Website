@extends('admin.layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="mb-5 ms-5 text-decoration-none text-dark" onclick="history.back()">
            <i class="fa-solid fa-arrow-left pe-3"></i>back
        </div>
        <div class="row my-5">
            <div class="ms-5 offset-2 col-8">
                    <h4 class="product-name"></h4>
                   <div class="detail-box-container">
                        <div class="mt-2 detail-box ">
                            <p class="row">
                                <span class=" offset-1 col-4"><i class="fa-solid fa-user pe-2 text-primary"></i>Name</span>
                                <span class=" offset-1 col-5">{{ $message->user_name }}</span>
                            </p>
                            <p class="row">
                                <span class=" offset-1 col-4"> <i class="fa-solid fa-at pe-2 text-muted"></i>Email </span>
                                <span class=" offset-1 col-5">{{ $message->user_email }}</span>
                            </p>
                            <p class="row">
                                <span class=" offset-1 col-4"> <i class="fa-solid fa-calendar-minus text-success pe-2 "></i>Sent Date </span>
                                <span class=" offset-1 col-5">{{ $message->created_at->format('d-F-Y') }}</span>
                            </p>
                            <p class="p-2">
                                <h5 class="product-featured  px-5">Message</h5>
                                <p class="text-muted  px-5">{{ $message->message }}</p>
                            </p>

                        </div>
                   </div>
                    <hr>
            </div>
        </div>
    </div>
@endsection
