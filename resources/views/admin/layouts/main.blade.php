<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- Bootstrap Link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{-- fontaweasome link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- css link --}}
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    {{-- start side bar --}}
        <div class="container-fluid">
            <div class="main">
                <div class="sider-bar">
                    <p class="logo"><i class="fa-brands fa-shopify fs-3 pe-2"></i><span>Shopify</span></p>
                    <div class="menu-bar">
                        <ul>
                            <li><a href="{{ route('admin#category') }}" class="list-link"><i class="fa-solid fa-list-ul"></i><span>Category</span></a></li>
                            <li><a href="{{ route('admin#productList') }}" class="list-link"><i class="fa-brands fa-product-hunt"></i><span>Product</span></a></li>
                            <li><a href="{{ route('admin#productSubListPage') }}" class="list-link"><i class="fa-solid fa-list-check"></i><span>Sub Product</span></a></li>
                            <li><a href="{{ route('admin#orderListPage') }}" class="list-link"><i class="fa-regular fa-rectangle-list"></i><span>Order List</span></a></li>
                            <li><a href="{{ route('admin#userListPage') }}" class="list-link"><i class="fa-solid fa-users"></i><span>User List</span></a></li>
                            <li><a href="{{ route('admin#contactListPage') }}" class="list-link"><i class="fa-regular fa-comment-dots"></i><span> Comments</span></a></li>
                        </ul>
                        <ul class="log-out">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                              <button class="btn btn-danger"> <i class="fa-solid fa-arrow-right-from-bracket pe-3"></i><span>Log out</span></button>
                            </form>
                        </ul>
                    </div>
                </div>
                <div class="row">
                   <div class="main-content">
                        <nav>
                            <div class="site-name">
                                <span class="panel">Admin Dashboard Panel</span>
                            </div>
                            <div class="account pe-4">
                                @if (Auth::user()->image==null && Auth::user()->gender=='female')
                                    <img src="{{ asset('images/user.webp') }}" onclick="toggleMenu()" style='width:55px;height:50px'>
                                @elseif (Auth::user()->image==null && Auth::user()->gender=='male')
                                    <img src="{{ asset('images/user-male.jpg') }}"  onclick="toggleMenu()" style='width:55px;height:50px'>
                                @else
                                    <img src="{{ asset('storage/'.Auth::user()->image)}}" onclick="toggleMenu()" style='width:55px;height:50px'>
                                @endif
                                <span class="ps-2">{{ Auth::user()->name }}</span>

                                <div class="account-menu" id='sub-menu'>
                                    <div class="sub-account-menu">
                                        <div class="user-info">
                                            @if (Auth::user()->image==null && Auth::user()->gender=='female')
                                                <img src="{{ asset('images/user.webp') }}" style='width:60px;height:50px'>
                                            @elseif (Auth::user()->image==null && Auth::user()->gender=='male')
                                                <img src="{{ asset('images/user-male.jpg') }}"  style='width:60px;height:50px'>
                                            @else
                                                <img src="{{ asset('storage/'.Auth::user()->image)}}" style='width:60px;height:50px'>
                                            @endif
                                            <span class="ps-3 fs-5">{{ Auth::user()->name }}</span>
                                        </div>
                                        <hr>
                                        <ul>
                                            <li class="pt-2 pb-5">
                                                <a href="{{ route('admin#accountDetailPage',Auth::user()->id) }}" class=" text-dark text-decoration-none">
                                                    <i class="fa-solid fa-user fs-5 pe-4"></i>
                                                    <span> Account</span>
                                                </a>
                                            </li>
                                            <li class="pt-2 pb-5">
                                            <a href="{{ route('admin#listPage') }}" class=" text-dark text-decoration-none">
                                                    <i class="fa-solid fa-users fs-5 pe-4"></i>
                                                    <span>Admin List</span>
                                            </a>
                                            </li>
                                            <li class="pt-2 pb-3">
                                                <a href="{{ route('admin#passwordChangePage') }}" class=" text-dark text-decoration-none">
                                                    <i class="fa-solid fa-key fs-5 pe-4"></i>
                                                    <span>  Password Change</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </nav>
                         @yield('content')
                   </div>
                </div>
            </div>
        </div>
    {{-- end side bar --}}

</body>
    {{-- bootstrap link --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    {{-- jquery link --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- for accout dropdown --}}
    <script>
        let subMenu=document.getElementById('sub-menu');
        function toggleMenu(){
            subMenu.classList.toggle('open-menu')
        }
    </script>

    @yield('scriptSource')
</html>
