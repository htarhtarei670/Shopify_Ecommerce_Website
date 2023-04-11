@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="offset-3 col-5">
            <button class="btn btn-secondary" onclick="history.back()">List</button>
            <div class="add-box">
                <h3 class="text-center pt-3">Create Your Category</h3>
                <hr>
                <div class="mx-4 mt-4">
                    <form action="{{ route('admin#categoryCreateProcess') }}" method="POST">
                        @csrf
                        <label for="" class="fs-6 pb-2">Category Name</label>
                        <input type="text" class="form-control  @error('categoryName') is-invalid @enderror" name="categoryName" placeholder="Enter your category..">
                        @error('categoryName')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <button type="submit" class="btn btn-secondary w-100 mt-4">Create<i class="fa-regular fa-circle-right ps-2"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
