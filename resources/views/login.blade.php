@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="main-container">
            <div class="row group">
                <div class="fs-4 text-danger my-4"><i class="fa-brands fa-shopify pe-2 ps-4 "></i>Shopify</div>
                <div class="col-6">
                    <img src="{{ asset('images/login.svg') }}" class="loginBack">
                </div>
                <div class="col-6 px-5">
                   <div class=>
                        <h3>Welcome Back😍</h3>
                        <p class="text-muted">To keep connect with us,please login with your personal information by email and password.🔔</p>
                   </div>
                    <div class="py-2">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                                <div class="input-box">
                                    <input type="email" name='email' value="{{ old('email') }}" required>
                                    <label for=""><i class="fa-solid fa-envelope pe-2"></i>Your Email</label>
                                </div>
                                <div class="input-box">
                                    <input type="password" name='password' value="{{ old('password') }}" required>
                                    <label for=""><i class="fa-solid fa-key pe-2"></i>Password</label>
                                </div>
                                 <div class="">
                                   <small> Do you haven't any account? <a href="{{ route('register#page') }}">Create account</a></small>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger float-right px-3 mt-3">Login</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
