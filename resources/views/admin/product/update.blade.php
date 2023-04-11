@extends('admin.layouts.main')

@section('content')
    <div class="container mt-5">
    <div class="mb-5 ms-5 text-decoration-none text-dark" onclick="history.back()">
        <i class="fa-solid fa-arrow-left pe-3"></i>back
    </div>
       <form action="{{ route('admin#updateProcess') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-4 offset-1" >
                    @if ($update->image!=null)
                        <img src="{{ asset('storage/'.$update->image) }}" style="width: 100%;height:350px">
                    @else
                        <img src="{{ asset('images/img-not-found.png') }}" style="width: 100%;height:350px">
                    @endif
                    <input type="file" name="productImage" class='form-control @error('productImage') is-invalid @enderror' value="{{ $update->image }}">
                    @error('productImage')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <a href="">
                        <button class="btn btn-danger w-100 mt-3" type="submit"><i class="fa-solid fa-pen-to-square pe-2"></i>Update</button>
                    </a>
                </div>
                <div class="ms-5 col-6 form-group">
                    <input type="hidden" name="productId" value="{{ $update->id }}">
                    <div class="p-5">
                        <div class="mt-3">
                            <label for="" class="fs-6 pb-2">Product Name</label>
                            <input type="text" class="form-control  @error('productName') is-invalid @enderror" name="productName" placeholder="Enter your category.." value='{{ old('productName',$update->name) }}'>
                            @error('productName')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label for="">Category</label>
                            <select name="categoryId" class="form-control @error('categoryId') is-invalid @enderror" value='{{ old('categoryId',$update->category_id) }}'>
                                <option value="">Choose Category..</option>
                                @foreach ($category as $c)
                                    <option value="{{ $c->id }}" @if($update->category_id==$c->id) selected @endif>{{ $c->name }}</option>
                                @endforeach
                            </select>
                            @error('categoryId')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label for="">Collection</label>
                            <select name="collection" class="form-control @error('collection') is-invalid @enderror">
                                <option value="">Choose Collection..</option>
                                <option value="men" @if($update->collection == 'men') selected @endif>Men</option>
                                <option value="women" @if($update->collection == 'women') selected @endif>Women</option>
                                <option value="children" @if($update->collection == 'children') selected @endif>Children</option>
                                <option value="elder" @if($update->collection == 'elder') selected @endif>Elder</option>
                                <option value="men and women" @if($update->collection == 'men and women') selected @endif>Men and Women</option>
                            </select>
                            @error('collection')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label for="" class="fs-6 pb-2">Prcie</label>
                            <input type="text" class="form-control  @error('price') is-invalid @enderror" name="price" placeholder="Enter your category.." value='{{ old('price',$update->price) }}'>
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label for="" class="fs-6 pb-2">Description</label>
                            <textarea name="description" id="" cols="5" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="Write Something.." >{{ old('description',$update->description) }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
       </form>
    </div>
@endsection
