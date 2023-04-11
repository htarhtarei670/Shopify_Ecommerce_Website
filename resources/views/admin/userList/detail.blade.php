@extends('admin.layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="mb-5 ms-5 text-decoration-none text-dark" onclick="history.back()">
            <i class="fa-solid fa-arrow-left pe-3"></i>back
        </div>
        <div class="row my-5">
            <div class="col-4 offset-1" >
                @if ($user->image==null && $user->gender=='female')
                    <img src="{{ asset('images/user.webp') }}" style="width: 100%;height:400px">
                @elseif ($user->image==null && $user->gender=='male')
                    <img src="{{ asset('images/user-male.jpg') }}" style="width: 100%;height:400px" >
                @else
                    <img src="{{ asset('storage/'.$user->image)}}" style="width: 100%;height:400px">
                @endif
            </div>
            <div class="ms-5 col-6">
                    <h4 class="product-name"></h4>
                   <div class="detail-box-container">
                        <div class="mt-2 detail-box ">
                            <p class="row">
                                <span class=" offset-1 col-4"><i class="fa-solid fa-user pe-2 text-primary"></i>Name</span>
                                <span class=" offset-1 col-5"> {{ $user->name }}</span>
                            </p>
                            <p class="row">
                            <span class=" offset-1 col-4"> <i class="fa-solid fa-at pe-2 text-muted"></i>Email </span>
                            <span class=" offset-1 col-5"> {{$user->email }}</span>
                            </p>
                            <p class="row">
                                <span class=" offset-1 col-4"><i class="fa-solid fa-location-dot pe-2 text-danger"></i> Address</span>
                            <span class=" offset-1 col-5">{{$user->address }}</span>
                            </p>
                            <p class="row">
                                <span class=" offset-1 col-4"><i class="fa-solid fa-phone pe-2 text-success"></i>Phone</span>
                                <span class=" offset-1 col-5"> {{$user->phone }}</span>
                            </p>
                            <p class="row">
                                <span class=" offset-1 col-4"> <i class="fa-solid fa-venus-mars pe-2 text-infor"></i>Gender</span>
                                <span class=" offset-1 col-5"> {{ $user->gender }}</span>
                            </p>
                             <p class="row">
                                <span class=" offset-1 col-4"> <i class="fa-regular fa-clock pe-2 text-danger"></i>Joined Date</span>
                                <span class=" offset-1 col-5">{{ $user->created_at->format('d-F-Y') }}</span>
                            </p>
                        </div>
                   </div>
                    <hr>
            </div>
        </div>
    </div>
@endsection
