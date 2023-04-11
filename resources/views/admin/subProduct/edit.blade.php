@extends('admin.layouts.main')

@section('content')
    <div class="container mt-5">
    <div class="mb-5 ms-5 text-decoration-none text-dark" onclick="history.back()">
        <i class="fa-solid fa-arrow-left pe-3"></i>back
    </div>
       <form action="{{ route('admin#productSubUpdateProcess') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-4 offset-1" >
                    @if ($subProduct->image!=null)
                        <img src="{{ asset('storage/'.$subProduct->image) }}" style="width: 100%;height:430px">
                    @else
                        <img src="{{ asset('images/img-not-found.png') }}" style="width: 100%;height:430px">
                    @endif
                    <input type="file" name="productImage" class='form-control @error('productImage') is-invalid @enderror'>
                    @error('productImage')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <input type="hidden" name="subProductId" value="{{ $subProduct->id }}">

                    <button class="btn btn-danger w-100 mt-3" type="submit"><i class="fa-solid fa-pen-to-square pe-2"></i>Update</button>
                </div>
                <div class="ms-5 col-6 form-group">
                    <div class="p-5">
                        <div class="mt-3">
                            <label for="" class="fs-6 pb-2">Main Product Name</label>
                            <select name="productId" class="form-control  @error('productId') is-invalid @enderror">
                                <option value="">Change Main Product Name</option>
                                @foreach ($product as $p)
                                    <option value="{{ $p->id }}" @if($subProduct->product_id==$p->id) selected @endif>{{ $p->name }}</option>
                                @endforeach
                            </select>
                            @error('productId')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
       </form>
    </div>
@endsection
