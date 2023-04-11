@extends('users.layouts.main')

@section('content')
    <div class="container-fluid category">
        <div class="row pt-4">
            <div class="col-3">
                <div class="category-box">
                    <div class="category-show">
                      CATEGORY <span class="badge text-bg-danger">{{ count($category) }}</span>
                    </div>
                    <ul>
                        <li class="cate"><a href="{{ route('user#shopPage') }}" >All</a></li>
                        @foreach ($category as $c)
                            <li class="cate"><a href="{{ route('user#fliterByCategory',$c->id) }}" >{{ $c->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

            </div>
            <div class="col-9 mt-4">
                <div class="">
                   <a href="{{ route('user#orderPage') }}">
                        <button type="button" class="btn bg-dark text-white position-relative me-2">
                            <i class="fa-solid fa-cart-plus pe-2 py-2"></i>My Cart
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                               {{ count($cart) }}
                            </span>
                        </button>
                   </a>
                    <a href="{{ route('user#orderListPage') }}">
                        <button type="button" class="btn bg-dark text-white position-relative me-2">
                            <i class="fa-solid fa-clock-rotate-left pe-2 py-2"></i> History
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                              3
                            </span>
                        </button>
                    </a>
                </div>
                <div class="row card-list">
                    @foreach ($product as $p)
                        <div class="col-4 cart mt-3">
                            {{-- hidden area --}}
                            <input type="hidden" class='productId' value='{{ $p->id }}'>
                            <input type="hidden" class='userId' value='{{ Auth::user()->id}}'>
                            <input type="hidden" class='image' value='{{ $p->image }}'>

                            <img src="{{ asset('storage/'.$p->image) }}" class="card-img">
                            <div class="action-list">
                                <button class="action cartBtn">
                                    <i class="fa-solid fa-cart-plus "></i>
                                </button>

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
            </div>
        </div>
    </div>
@endsection

@section('scriptSource')
    <script>
        $(document).ready(function(){
            // add a cart to cart table with cart btn
            $('.cartBtn').click(function(){
                $parentNode=$(this).parents('.cart');

                $productId=$parentNode.find('.productId').val();
                $userId=$parentNode.find('.userId').val();
                $image=$parentNode.find('.image').val();

                $data={
                    'productId':$productId,
                    'userId':$userId,
                    'image':$image,
                }
                // console.log($data);

                $.ajax({
                    type:'get',
                    url:'http://127.0.0.1:8000/user/order/add/cart/witn/cart/btn',
                    data:$data,
                    dataType:'json',
                    success:function(){

                    }
                })
                location.reload();
            })
        })
    </script>
@endsection
