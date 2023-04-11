@extends('admin.layouts.main')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="offset-3 col-5">
                <button class="btn btn-secondary" onclick="history.back()">List</button>
                <div class="add-box">
                    <h3 class="text-center pt-3">Create Your Sub Product</h3>
                    <hr>
                    <div class="mx-4 mt-4">
                        <form action="{{ route('admin#productSubCreateProcess') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <label for="">Product Id</label>
                                <select name="productId" class="form-control @error('productId') is-invalid @enderror" value='{{ old('productId') }}'>
                                    <option value="">Choose Main Product..</option>
                                    @foreach ($product as $p)
                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                                @error('productId')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label for="" class="fs-6 pb-2">Image</label>
                                <input type="file" class="form-control  @error('productImage') is-invalid @enderror" name="productImage" placeholder="Enter your category.." value='{{ old('productImage') }}'>
                                @error('productImage')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-secondary w-100 mt-4">Create<i class="fa-regular fa-circle-right ps-2"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
