@extends('admin.layouts.main')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="offset-3 col-5">
                <button class="btn btn-secondary" onclick="history.back()">List</button>
                <div class="add-box">
                    <h3 class="text-center pt-3">Create Your Product</h3>
                    <hr>
                    <div class="mx-4 mt-4">
                        <form action="{{ route('admin#productCreateProcess') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <label for="" class="fs-6 pb-2">Product Name</label>
                                <input type="text" class="form-control  @error('productName') is-invalid @enderror" name="productName" placeholder="Enter your category.." value='{{ old('productName') }}'>
                                @error('productName')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label for="">Category</label>
                                <select name="categoryId" class="form-control @error('categoryId') is-invalid @enderror" value='{{ old('categoryId') }}'>
                                    <option value="">Choose Category..</option>
                                    @foreach ($category as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                                @error('categoryId')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label for="">Collection</label>
                                <select name="collection" class="form-control @error('collection') is-invalid @enderror" value='{{ old('collection') }}'>
                                    <option value="">Choose Collection..</option>
                                    <option value="men">Men</option>
                                    <option value="women">Women</option>
                                    <option value="men and women">Men and Women</option>
                                    <option value="children">Children</option>
                                    <option value="elder">Elder</option>
                                </select>
                                @error('collection')
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

                            <div class="mt-3">
                                <label for="" class="fs-6 pb-2">Prcie</label>
                                <input type="text" class="form-control  @error('price') is-invalid @enderror" name="price" placeholder="Enter your category.." value='{{ old('price') }}'>
                                @error('price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label for="" class="fs-6 pb-2">Description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" placeholder="Write Something.." >{{ old('description') }}</textarea>
                                @error('description')
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
