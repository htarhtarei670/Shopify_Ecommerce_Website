@extends('users.layouts.main')

@section('content')
    <div class="container-fluid">
        {{-- start intro part --}}
        <div class="row intro-control">
            <div class="col-6 intro">
                <div class="sale">
                    <h5>Fashion Sale</h5>
                    <h3 class="animate__animated animate__fadeInUp">Minimal Menz Style</h3>
                    <p class="animate__animated animate__fadeInUp col-8">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Soluta commodi laboriosam eos dolore, deserunt voluptate ipsa fugiat perspiciatis magni
                        repudiandae assumenda quos dicta veritatis eveniet magnam nulla sit alias. Error?</p>
                    <a href="{{ route('user#shopPage') }}">
                        <button class="animate__animated animate__fadeInUp show-btn">SHOP NOW</button>
                    </a>
                </div>
            </div>
        </div>
        {{-- end intro part --}}

        {{-- start logo area --}}
        <section class="logo-area">
            <img src="{{ asset('images/1.png') }}">
            <img src="{{ asset('images/2.png') }}">
            <img src="{{ asset('images/3.png') }}">
            <img src="{{ asset('images/4.png') }}">
            <img src="{{ asset('images/5.png') }}">
            <img src="{{ asset('images/6.png') }}">
        </section>
        {{-- end logo area --}}

        {{-- start collection list --}}
        <section id="collection-list" class="container-fluid">
            <div class="row">
                <div class="col-4 one">
                    <img src="{{ asset('images/fashion1.jpg') }}" alt="">
                    <div class="detail">
                        <h4 class=" text-white fw-3">Men's Fashion</h4>
                        <a href="{{ route('user#shopPage') }}" class="buy-btn">Shop Now</a>
                    </div>
                </div>
                <div class="col-4 one">
                    <img src="{{ asset('images/fashion2.webp') }}" alt="">
                    <div class="detail">
                        <h4 class=" text-white fw-3">Women's Fashion</h4>
                        <a href="{{route('user#shopPage')}}" class="buy-btn">Shop Now</a>
                    </div>
                </div>
                <div class="col-4 one">
                    <img src="{{ asset('images/fashion3.jpg') }}" alt="">
                    <div class="detail">
                        <h4 class=" text-white fw-3">Baby's Fashion</h4>
                        <a href="{{ route('user#shopPage') }}" class="buy-btn">Shop Now</a>
                    </div>
                </div>
            </div>
        </section>
        {{-- end collection list --}}

        {{-- start trend list --}}
        <section class="container trend-list">
            <h1 class="sub-header">Trending This Week</h1>
            <div class="swiper mySwiper">
                <div class="card-list swiper-wrapper">
                   @foreach ($trendProduct as $t)
                        <div class="cart col-3 swiper-slide">
                             {{-- hidden area --}}
                            <input type="hidden" class='productId' value='{{ $t->id }}'>
                            <input type="hidden" class='userId' value='{{ Auth::user()->id}}'>
                            <input type="hidden" class='image' value='{{ $t->image }}'>

                            <img src="{{ asset('storage/'.$t->image) }}" class="card-img">
                            <div class="action-list">
                                <button class="action cartBtn">
                                    <i class="fa-solid fa-cart-plus "></i>
                                </button>

                                <a href="">
                                    <button class="action">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </a>
                                <a href="{{ route('user#productDetailPage',$t->id) }}">
                                    <button class="action">
                                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="product-detail">
                                <h6>{{ $t->name }}</h6>
                                <p>{{ $t->price }}</p>
                            </div>
                        </div>
                   @endforeach
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
            </div>
        </section>
        {{-- end trend list --}}

        {{-- start promotion notice --}}
        <section class="promotion-notice">
            <div class="container-fluid promotion">
                <div class="col-4">
                    <h5 class='text-uppercase season'>Mid season's sale</h5>
                    <h3 class="text-capitalize off-sale">Autumn Collection</h3>
                    <h3 class="text-capitalize off-sale">Up to 20% off</h3>
                    <a href="{{ route('user#shopPage') }}">
                        <button class="show-btn">Shop Now</button>
                    </a>
                </div>
            </div>
        </section>
        {{-- end promotion notice --}}

        {{-- start you may like list --}}
        <section class="container may-list">
            <h1 class="sub-header">You May Like</h1>
            <div class="swiper mySwiper">
                <div class="card-list swiper-wrapper">
                   @foreach ($maylike as $m)
                        <div class="cart col-3 swiper-slide cartBtn">
                            {{-- hidden area --}}
                            <input type="hidden" class='productId' value='{{ $t->id }}'>
                            <input type="hidden" class='userId' value='{{ Auth::user()->id}}'>
                            <input type="hidden" class='image' value='{{ $t->image }}'>
                            
                            <img src="{{ asset('storage/'.$m->image) }}" class="card-img">
                            <div class="action-list">
                                <button class="action">
                                    <i class="fa-solid fa-cart-plus "></i>
                                </button>
                               <a href="">
                                    <button class="action">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                               </a>
                                <a href="{{ route('user#productDetailPage',$m->id) }}">
                                    <button class="action">
                                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="product-detail">
                                <h6>{{ $m->name }}</h6>
                                <p>{{ $m->price }}</p>
                            </div>
                        </div>
                   @endforeach

                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
            </div>
        </section>
        {{-- end you may like list --}}

        {{-- latest new --}}
        <section id="lastest-news">
            <div class="container">
                <h1 class="sub-header">Latest News</h1>
                <div class="row">
                    <div class="col-4 lastest-news">
                        <img src="{{ asset('images/ctop1.jpg') }}">
                        <div class="lastest-detail">
                            <h6 class="fs-6 pt-3 text-muted">Crochet Top</h6>
                            <h4 class="fs-5 pt-2 fw-3">What Curling Irons Are The Best Ones</h4>
                            <p class="text-muted pt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum ullam, accusamus eligendi autem sed sunt in at cumque corporis assumenda!</p>
                            <a href="" class=" text-dark fw-3 fs-6">Read More</a>
                        </div>
                    </div>
                    <div class="col-4 lastest-news">
                        <img src="{{ asset('images/boot1.jpg') }}">
                        <div class="lastest-detail">
                            <h6 class="fs-6 pt-3 text-muted">Boot with leather</h6>
                            <h4 class="fs-5 pt-2 fw-3">Shine And Comfort To Wear</h4>
                            <p class="text-muted pt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum ullam, accusamus eligendi autem sed sunt in at cumque corporis assumenda!</p>
                            <a href="" class=" text-dark fw-3 fs-6">Read More</a>
                        </div>
                    </div>
                    <div class="col-4 lastest-news">
                        <img src="{{ asset('images/handmake2.jpg') }}">
                        <div class="lastest-detail">
                            <h6 class="fs-6 pt-3 text-muted">Heart Bag</h6>
                            <h4 class="fs-5 pt-2 fw-3">Light To Carry</h4>
                            <p class="text-muted pt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum ullam, accusamus eligendi autem sed sunt in at cumque corporis assumenda!</p>
                            <a href="" class=" text-dark fw-3 fs-6">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- end lastest new --}}

        <section id="delivery">
            <div class="container">
                <div class="row px-5 ">
                    <div class="delivery col-3">
                        <div >
                            <i class="fa-solid fa-truck-moving fs-1 pb-4"></i>
                            <h6 class="fs-5 fw-3">Fast & Free Delivery</h6>
                            <p class=" text-muted">Free delivery on all orders</p>
                        </div>
                    </div>
                    <div class="delivery col-3">
                        <div >
                            <i class="fa-solid fa-shop-lock fs-1 pb-4"></i>
                            <h6 class="fs-5 fw-3">Secure Payment</h6>
                            <p class=" text-muted">We are serious about payment</p>
                        </div>
                    </div>
                    <div class="delivery col-3">
                        <div >
                            <i class="fa-solid fa-money-bill-transfer fs-1 pb-4 "></i>
                            <h6 class="fs-5 fw-3">Money Back Guarantee</h6>
                            <p class=" text-muted">Free delivery on all orders</p>
                        </div>
                    </div>
                    <div class="deliver col-3">
                        <div >
                            <i class="fa-solid fa-business-time  fs-1 pb-4"></i>
                            <h6 class="fs-5 fw-3">Online Support</h6>
                            <p class=" text-muted">We support online payment</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scriptSource')
    <script src="{{ asset('js/script.js') }}"></script>
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
