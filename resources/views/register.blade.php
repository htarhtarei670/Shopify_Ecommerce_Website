@extends('layouts.main')

@section('content')
   <div class="container">
     <div class="main-container">
        <div class="row group">
            <div class="fs-4 text-danger my-4"><i class="fa-brands fa-shopify pe-2 ps-4 "></i>Shopify</div>
            <div class="col-6 px-5">
                <form action="{{ route('register') }}" method='POST'>
                    @error('terms')
                        <p class=" text-danger fs-6">{{ $message }}</p>
                    @enderror
                    @csrf
                    <div class="py-2">
                        <div class="input-box">
                            <input type="text" name="name" value='{{ old('name') }}' required>
                            <label for=""><i class="fa-solid fa-user pe-1"></i>Name</label>
                            @error('name')
                                <p class=" text-danger fs-6">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-box">
                            <input type="email" name="email" value='{{ old('email') }}' required>
                            <label for=""><i class="fa-solid fa-envelope pe-1"></i>Email</label>
                             @error('email')
                                <p class=" text-danger fs-6">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-box">
                            <input type="text" name="phone"  value='{{ old('phone') }}' required>
                            <label for=""><i class="fa-solid fa-phone-volume pe-1"></i>Phone</label>
                             @error('phone')
                                <p class=" text-danger fs-6">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-box">
                            <input type="text" name="address" value='{{ old('address') }}' required>
                            <label for=""><i class="fa-solid fa-map-location pe-1" ></i>Address</label>
                             @error('address')
                                <p class=" text-danger fs-6">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-box">
                            <input type="password" name="password" value='{{ old('password') }}' required>
                            <label for=""><i class="fa-solid fa-key pe-1" ></i>Password</label>
                             @error('password')
                                <p class=" text-danger fs-6">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-box">
                            <input type="password" name="password_confirmation" value='{{ old('password_confirmation') }}' required>
                            <label for=""><i class="fa-solid fa-key pe-1" ></i>Confrim Password</label>
                             @error('password_confirmation')
                                <p class=" text-danger fs-6">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                       <small> Do you already have account? <a href="{{ route('login#page') }}">Login</a></small>
                    </div>
                    <button type="submit" class="btn btn-danger float-right px-3 mt-3 mb-5">Sign up</button>
                </form>
            </div>
            <div class="col-6 ">
                <h3>Welcome to Shopify</h3>
                <p class=" text-muted">To get other chances let sign up here....Our Teams will give you any promotion🔔</p>
               <div class="d-flex align-items-center">
                 <img src="{{ asset('images/signup.svg') }}" class="loginBack">
               </div>
            </div>
        </div>
    </div>
   </div>
@endsection
