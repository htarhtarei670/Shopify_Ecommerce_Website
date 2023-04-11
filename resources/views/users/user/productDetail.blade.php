@extends('users.layouts.main')

@section('content')
    <div class="container my-5 pt-5">
        <div class=" text-decoration-none text-dark" onclick="history.back()">
            <i class="fa-solid fa-arrow-left pe-3"></i>back
        </div>
        <div class="row py-5">
            <div class="col-4 pe-4">
                <img src="{{ asset('storage/'.$mainProduct->image)}}" class="main-img" id="main-img">
                <div class="sub-img-group ">
                    @foreach ($subProduct as $s)
                        <div class="sub-img-col">
                            <img src="{{ asset('storage/'.$s->image)}}" width="100%" height="110px" class="sub-img" >
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-7 ps-4 product-info-container">
                <div class="product-info">
                    <div class="d-flex justify-content-between">
                        <span class="product-collection">Collection/{{ $mainProduct->collection }}</span>
                        <span class="">
                           <button class="view"> <i class="fa-solid fa-eye"></i> {{ $mainProduct->view_count }}</button>
                        </span>
                    </div>
                    <h4 class="productName">{{ $mainProduct->name }}</h4>
                    <p class="fs-1 text-danger productPrice">${{ $mainProduct->price }}</p>
                    <div class="detial-group">
                        <h5 class="product-featured">Product Detail</h5>
                        <p class=" text-muted">{{ $mainProduct->description }}</p>
                    </div>
                    <div class="choose-area mb-4">
                        <div class="col-3">
                            <select name="product-size" id="" class="form-control py-2 productSize">
                                <option value="">Choose Size</option>
                                <option value="s">S</option>
                                <option value="xl">XL</option>
                                <option value="xxl">XXL</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                            </select>
                        </div>
                        <div class="ps-3 qty-box">
                            <button id="minus" onclick="minus()"><i class="fa-solid fa-minus"></i></button>
                            <input type="text" name="qty" id="qty" readonly value="1">
                            <button id="plus" onclick="plus()"><i class="fa-solid fa-plus"></i></button>
                            <input type="hidden" name="userId" id='userId' value="{{ Auth::user()->id }}">
                            <input type="hidden" name="productId" id='productId' value="{{ $mainProduct->id }}">
                        </div>
                    </div>

                    <button class="show-btn" id='addCart'><i class="fa-solid fa-cart-shopping pe-2"></i>Add To Cart</button>

                </div>
                <hr>
            </div>
        </div>
        <div class="container trend-list mt-5">
            <h1 class="sub-header text-capitalize">Here you can see our product</h1>
            <div class="swiper mySwiper">
                <div class="card-list swiper-wrapper">
                    @foreach ($products as $p)
                        <div class="cart col-3 swiper-slide">
                            <input type="hidden" id="productId" value="{{ $p->id }}">
                            <img src="{{ asset('storage/'.$p->image) }}" class="card-img">
                            <div class="action-list">
                               <a href="">
                                    <button class="action">
                                        <i class="fa-solid fa-cart-plus "></i>
                                    </button>
                               </a>
                                <a href="">
                                    <button class="action">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </a>
                                <a href="{{ route('user#productDetailPage',$p->id) }}">
                                    <button class="action">
                                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="product-detail">
                                <h6>{{ $p->name }}</h6>
                                <p>{{ $p->price }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
@endsection

@section('scriptSource')
    <script>
         $(document).ready(function(){
            //to increase view_count
            $productId=$('#productId').val();
            $data={
                'productId':$productId,
            };
            $.ajax({
                type:'get',
                url:'http://127.0.0.1:8000/user/product/view/count/increase',
                data:$data,
                dataType:'json',
                success:function(){

            }
            // location.reload();
            })

            //to add data to cart
            $('.show-btn').click(function(){
                $mainImg=$('#main-img').attr("src").replace("http://127.0.0.1:8000/storage/", "");
                $productSize=$('.productSize').val();
                $qty=$('#qty').val();
                $userId=$('#userId').val();
                $productId=$('#productId').val();

                $source={
                    'user_id':$userId,
                    'product_id':$productId,
                    'product_size':$productSize,
                    'product_img':$mainImg,
                    'qty':$qty,
                };

                $.ajax({
                    type:'get',
                    url:'http://127.0.0.1:8000/user/order/add/cart',
                    data:$source,
                    dataType:'json',
                    success:function($reponse){
                        if($reponse.status =='true'){
                            window.location.href='http://127.0.0.1:8000/user/shop/page'
                        }
                    }
                })
            })
        })
    </script>

<script src="{{ asset('js/script.js') }}"></script>


@endsection
