@extends('admin.layouts.main')

@section('content')
    <div class="container mt-5">
    <div class="mb-5 ms-5 text-decoration-none text-dark" onclick="history.back()">
        <i class="fa-solid fa-arrow-left pe-3"></i>back
    </div>
       <form action="{{ route('admin#accountUpdateProcess') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-4 offset-1" >

                    @if (Auth::user()->image==null && Auth::user()->gender=='female')
                        <img src="{{ asset('images/user.webp') }}" style="width: 100%;height:430px">
                    @elseif (Auth::user()->image==null && Auth::user()->gender=='male')
                        <img src="{{ asset('images/user-male.jpg') }}" style="width: 100%;height:430px" >
                    @else
                        <img src="{{ asset('storage/'.Auth::user()->image)}}" style="width: 100%;height:430px">
                    @endif

                    <input type="file" name="userImage" class='form-control @error('userImage') is-invalid @enderror'>
                    @error('userImage')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <a href="">
                        <button class="btn btn-danger w-100 mt-3" type="submit"><i class="fa-solid fa-pen-to-square pe-2"></i>Update</button>
                    </a>
                </div>
                <div class="ms-5 col-6 form-group">
                    <input type="hidden" name="userId" value="{{ $update->id }}">
                    <div class="px-5 pb-5">
                        <div>
                            <label for="" class="fs-6 pb-2">Name</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" placeholder="Enter your category.." value='{{ old('name',$update->name) }}'>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label for="" class="fs-6 pb-2">Email</label>
                            <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="Enter your category.." value='{{ old('email',$update->email) }}'>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label for="">Gender</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">Choose gender..</option>
                                <option value="male" @if($update->gender == 'male') selected @endif>Male</option>
                                <option value="female" @if($update->gender == 'female') selected @endif>Female</option>

                            </select>
                            @error('collection')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label for="" class="fs-6 pb-2">Phone</label>
                            <input type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone" placeholder="Enter your category.." value='{{ old('phone',$update->phone) }}'>
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label for="" class="fs-6 pb-2">Address</label>
                            <textarea name="address" id="" cols="5" rows="5" class="form-control @error('address') is-invalid @enderror" placeholder="Write Something.." >{{ old('address',$update->address) }}</textarea>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label for="" class="fs-6 pb-2">Joined Date</label>
                            <input type="text" class="form-control  @error('joinedDate') is-invalid @enderror" name="joinedDate" placeholder="Enter your category.." value='{{ old('joinedDate',$update->created_at->format('d-F-Y')) }}' disabled>
                            @error('joinedDate')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> 
                    </div>
                </div>
            </div>
       </form>
    </div>
@endsection
