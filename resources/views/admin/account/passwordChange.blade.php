@extends('admin.layouts.main')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="offset-8 col-4">
                 @if (session('changeSuccess'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <i class="fa-regular fa-circle-check pe-2"></i> {{ session('changeSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                 @if (session('changeFail'))
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    <i class="fa-solid fa-triangle-exclamation pe-2"></i> {{ session('changeFail') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            <div class="offset-3 col-5">
                <button class="btn btn-secondary mb-5" onclick="history.back()">List</button>
                <div class="detail-box-container">
                    <h3 class="text-center pt-3">Change Password</h3>
                    <hr>
                    <div class="mx-4 mt-4 detail-box">
                        <form action="{{ route('admin#passwordChangeProcess') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <label for="" class="fs-6 pb-2">Old Password</label>
                                <input type="password" class="form-control  @error('oldPassword') is-invalid @enderror" name="oldPassword" placeholder="Enter old password.." value='{{ old('oldPassword') }}'>
                                @error('oldPassword')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label for="" class="fs-6 pb-2">New Password</label>
                                <input type="password" class="form-control  @error('newPassword') is-invalid @enderror" name="newPassword" placeholder="Enter new password.." value='{{ old('newPassword') }}'>
                                @error('newPassword')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label for="" class="fs-6 pb-2">Confrim Password</label>
                                <input type="password" class="form-control  @error('confrimPassword') is-invalid @enderror" name="confrimPassword" placeholder="Enter confrim password.." value='{{ old('confrimPassword') }}'>
                                @error('confrimPassword')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-secondary w-100 mt-4">Change<i class="fa-solid fa-wrench ps-2"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
