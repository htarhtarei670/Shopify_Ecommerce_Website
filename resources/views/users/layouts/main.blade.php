<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    {{-- Bootstrap Link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{-- fontaweasome link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- ANIMATE CSS --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
      />

    {{-- Swipper Css --}}
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />

    {{-- css link --}}
    <link rel="stylesheet" href="{{ asset('css/users.css') }}">
</head>
<body>

     {{-- start nav bar --}}
        <nav class="fixed-top">
            <div class="container nav">
                <div class="logo">
                    <i class="fa-brands fa-shopify fs-3 pe-2"></i><span>Shopify</span>
                </div>
                <div class="page-link">
                    <ul>
                        <a href="{{ route('user#homePage') }}"><li class="link">Home</li></a>
                        <a href="{{ route('user#shopPage') }}"><li class="link">Shop</li></a>
                        <a href="{{ route('user#blogPage') }}"><li class="link">Blog</li></a>
                        <a href="{{ route('user#contactUsPage') }}"><li class="link">Contact</li></a>
                    </ul>
                </div>
                <div class="user-profile">
                    <div class="search-bar" id='search-bar'>
                        <span id="input-search"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" name="" id="" placeholder="Search....">
                    </div>

                   <a href="" class="text-decoration-none text-dark">
                     <i class="fa-solid fa-cart-shopping"></i>
                   </a>
                     @if (Auth::user()->image==null && Auth::user()->gender=='female')
                        <img src="{{ asset('images/user.webp') }}" onclick="toggleMenu()">
                    @elseif (Auth::user()->image==null && Auth::user()->gender=='male')
                        <img src="{{ asset('images/user-male.jpg') }}"  onclick="toggleMenu()">
                    @else
                        <img src="{{ asset('storage/'.Auth::user()->image)}}" onclick="toggleMenu()">
                    @endif
                    <div class="account-menu" id='sub-menu'>
                        <div class="sub-account-menu">
                            <div class="user-info">
                                @if (Auth::user()->image==null && Auth::user()->gender=='female')
                                    <img src="{{ asset('images/user.webp') }}">
                                @elseif (Auth::user()->image==null && Auth::user()->gender=='male')
                                    <img src="{{ asset('images/user-male.jpg') }}" >
                                @else
                                    <img src="{{ asset('storage/'.Auth::user()->image)}}">
                                @endif

                                <span class="ps-3 fs-5">{{ Auth::user()->name }}</span>
                            </div>
                            <hr>
                            <ul>
                                <li class="pt-2 pb-5">
                                    <a href="{{ route('user#accountpage',Auth::user()->id) }}" class="text-dark text-decoration-none">
                                        <i class="fa-solid fa-user fs-5 pe-4"></i>
                                           <span> Account</span>
                                    </a>
                                </li>

                                <li class="pt-2 pb-3">
                                    <a href="{{ route('user#passwordChange') }}" class="text-dark text-decoration-none">
                                        <i class="fa-solid fa-key fs-5 pe-4"></i>
                                        <span>Password Change</span>
                                    </a>
                                </li>

                                <form action="{{ route('logout') }}" method="POST" class="d-flex justify-content-center my-3 text-decoration-none">
                                    @csrf
                                    <button class="btn btn-danger w-75">Log Out</button>
                                </form>
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        {{-- end nav bar --}}

        <section class="content">
            @yield('content')
        </section>

        {{-- start footer --}}
       <section class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <div class="logo fs-1">
                            <i class="fa-brands fa-shopify fs-3 pe-2"></i><span>Shopify</span>
                        </div>
                        <hr>
                        <div class="contact-app">
                            <div class="contact">
                                <i class="fa-brands fa-facebook-f"></i>
                                <span class="contact-address"> Htar Htar Ei</span>
                            </div>
                            <div class="contact">
                                <i class="fa-brands fa-google"></i>
                                <span class="contact-address">htarhtarei@gmail.com</span>
                            </div>
                            <div class="contact">
                                <i class="fa-brands fa-telegram"></i>
                                <span class="contact-address">iris_is_here</span>
                            </div>
                            <div class="contact">
                                <i class="fa-solid fa-phone"></i>
                                <span class="contact-address">09786507670</span>
                            </div>
                        </div>
                    </div>
                    <div class="offset-1 col-2 list py-4">
                        <h5>Shop Men</h5>
                        <ul>
                            <li>Clothing Fashion</li>
                            <li>Winter</li>
                            <li>Summer</li>
                            <li>Formal</li>
                            <li>Casual</li>
                        </ul>
                    </div>
                    <div class="col-2 list py-4">
                        <h5>Shop Women</h5>
                        <ul>
                            <li>Clothing Fashion</li>
                            <li>Winter</li>
                            <li>Summer</li>
                            <li>Formal</li>
                            <li>Casual</li>
                        </ul>
                    </div>
                    <div class="col-2 list py-4">
                        <h5>Baby Collection</h5>
                        <ul>
                            <li>Clothing Fashion</li>
                            <li>Winter</li>
                            <li>Summer</li>
                            <li>Formal</li>
                            <li>Casual</li>
                        </ul>
                    </div>
                    <div class=" col-2 list py-4">
                        <h5>Quick Links</h5>
                        <ul>
                            <li>Track Your Order</li>
                            <li>Support</li>
                            <li>FAQ</li>
                            <li>Carrier</li>
                            <li>About</li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
                <hr>
                <small class="foot">Copyright ©2023 All rights reserved | This template is made with ❤️ by Colorlib</small>
            </div>
       </section>
        {{-- end footer --}}

</body>
{{-- <script src="{{ asset('js/script.js') }}"></script> --}}
    {{-- bootstrap link --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    {{-- Swipper Js --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    {{-- jquery link --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    {{-- for accout dropdown --}}
    <script>
        let searchBar=document.getElementById('search-bar');
        let searchIcon=document.getElementById('input-search');
        let subMenu=document.getElementById('sub-menu');
        function toggleMenu(){
            subMenu.classList.toggle('open-menu')
        }

        searchIcon.addEventListener('click',()=>searchBar.classList.toggle('open-input'))
    </script>


    @yield('scriptSource')
</html>
