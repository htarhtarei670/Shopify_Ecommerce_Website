@extends('admin.layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="mb-5 ms-5 text-decoration-none text-dark" onclick="history.back()">
            <i class="fa-solid fa-arrow-left pe-3"></i>back
        </div>
        <div class="row">
            <div class="col-4 offset-1" >
                @if ($read->image !=null)
                    <img src="{{ asset('storage/'.$read->image) }}" style="width: 100%;height:430px">
                @else
                    <img src="{{ asset('images/img-not-found.png') }}" style="width: 100%;height:430px">
                @endif
                <a href="{{ route('admin#updatePage',$read->id) }}">
                    <button class="btn btn-danger w-100 mt-3"><i class="fa-solid fa-pen-to-square pe-2"></i>Edit</button>
                </a>
            </div>
            <div class="ms-5 col-6">
                    <h4 class="product-name">{{ $read->name }}</h4>
                   <div class="detail-box-container">
                        <div class="mt-4 detail-box ">
                            <p class="row">
                                <span class=" offset-1 col-4"><i class="fa-solid fa-money-bill-1-wave pe-2 text-primary"></i>Price</span>
                                <span class=" offset-1 col-5">- {{ $read->price }}</span>
                            </p>
                            <p class="row">
                            <span class=" offset-1 col-4"> <i class="fa-solid fa-database pe-2 text-warning"></i>Category </span>
                            <span class=" offset-1 col-5">- {{ $read->category_name }}</span>
                            </p>
                            <p class="row">
                                <span class=" offset-1 col-4"><i class="fa-solid fa-layer-group pe-2 text-success"></i>Collection</span>
                            <span class=" offset-1 col-5">- {{ $read->collection }}</span>
                            </p>
                            <p class="row">
                                <span class=" offset-1 col-4"><i class="fa-regular fa-clock pe-2 text-danger"></i>Created Date</span>
                                <span class=" offset-1 col-5">- {{ $read->created_at->format('d-F-Y') }}</span>
                            </p>
                            <p class="row">
                            <span class=" offset-1 col-4"> <i class="fa-regular fa-eye pe-2 text-black"></i>View</span>
                            <span class=" offset-1 col-5"> - {{ $read->view_count }}</span>
                            </p>
                        </div>
                   </div>
                    <hr>

                    <div class="mt-4">
                        <p class="product-featured">Featured</p>
                        <p>{{ $read->description }}</p>
                    </div>
            </div>
        </div>
    </div>
@endsection
