@extends('users.layouts.main')

@section('content')
{{--  start blogs--}}
<div class="container pt-6">
    <div class="row">
        <div class="col-lg-7">
            <div class="blog mb-5">
                <img src="{{ asset('images/blog2.jpg') }}" class="blogImg ">
                <button class="blogDate btn">
                    <h3 class="fw-bolder">15</h3>
                    <p class="fw-bolder">Jan</p>
                </button>
                <div class="blogShadow">
                    <div class="p-lg-5 py-3 px-3">
                        <h3 class="txt fw-bolder pb-2">Google inks pact for new 35-storey office</h3>
                        <p class="text-white">That dominion stars lights dominion divide years for fourth have don't stars is that he earth it first without heaven in place seed it second morning saying.</p>
                        <div class="d-flex text-warning">
                            <div class="pe-5">
                                <i class="fa-solid fa-user pe-2"></i>
                                <small class="text-warning text-decoration-none">Travel,Lifestyle</small>
                            </div>
                            <div class="">
                                <i class="fa-solid fa-comments pe-2"></i>
                                <small class="text-warning text-decoration-none">03 Comments</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog mb-5">
                <img src="{{ asset('images/blog1.webp') }}" class="blogImg " style="width:100%;height:320px">
                <div class="blogShadow">
                    <button class="blogDate btn">
                        <h3 class="fw-bolder">19</h3>
                        <p class="fw-bolder">Jan</p>
                    </button>
                    <div class="p-lg-5 py-3 px-3">
                        <h3 class="txt fw-bolder pb-2">Google inks pact for new 35-storey office</h3>
                        <p class="text-white">That dominion stars lights dominion divide years for fourth have don't stars is that he earth it first without heaven in place seed it second morning saying.</p>
                        <div class="d-flex text-warning">
                            <div class="pe-5">
                                <i class="fa-solid fa-user pe-2"></i>
                                <small class="text-warning text-decoration-none">Make Cake Together</small>
                            </div>
                            <div class="">
                                <i class="fa-solid fa-comments pe-2"></i>
                                <small class="text-warning text-decoration-none">23 Comments</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="blog mb-5">
                <img src="{{ asset('images/blog3.jpg') }}" class="blogImg ">
                <div class="blogShadow ">
                    <button class="blogDate btn">
                        <h3 class="fw-bolder">31</h3>
                        <p class="fw-bolder">May</p>
                    </button>
                    <div class="p-lg-5 py-3 px-3">
                        <h3 class="txt fw-bolder pb-2">Google inks pact for new 35-storey office</h3>
                        <p class="text-white">That dominion stars lights dominion divide years for fourth have don't stars is that he earth it first without heaven in place seed it second morning saying.</p>
                        <div class="d-flex text-warning">
                            <div class="pe-5">
                                <i class="fa-solid fa-user pe-2"></i>
                                <small class="text-warning text-decoration-none">Spending With Family By Baking</small>
                            </div>
                            <div class="">
                                <i class="fa-solid fa-comments pe-2"></i>
                                <small class="text-warning text-decoration-none">43 Comments</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog mb-5">
                <img src="{{ asset('images/blog4.jpg') }}" class="blogImg ">
                <div class="blogShadow btn">
                    <button class="blogDate btn">
                        <h3 class="fw-bolder">15</h3>
                        <p class="fw-bolder">Jan</p>
                    </button>
                    <div class="p-lg-5 py-3 px-3">
                        <h3 class="txt fw-bolder pb-2">Google inks pact for new 35-storey office</h3>
                        <p class="text-white">That dominion stars lights dominion divide years for fourth have don't stars is that he earth it first without heaven in place seed it second morning saying.</p>
                        <div class="d-flex text-warning">
                            <div class="pe-5">
                                <i class="fa-solid fa-user pe-2"></i>
                                <small class="text-warning text-decoration-none">Travel,Lifestyle</small>
                            </div>
                            <div class="">
                                <i class="fa-solid fa-comments pe-2"></i>
                                <small class="text-warning text-decoration-none">03 Comments</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation example text-warning">
                  <ul class="pagination">
                    <li class="page-item">
                      <a class="page-link px-4 py-2 mx-1 blogPig" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
                    <li class="page-item"><a class="page-link px-4 py-2 mx-1 blogPig" href="#">1</a></li>
                    <li class="page-item"><a class="page-link px-4 py-2 mx-1 blogPig" href="#">2</a></li>
                    <li class="page-item"><a class="page-link px-4 py-2 mx-1 blogPig" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link px-4 py-2 mx-1 blogPig" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                  </ul>
                </nav>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="bg-white">
                <div class="input-group mb-3 px-5 py-4">
                  <input type="text" class="form-control" placeholder="Search Keyword" aria-label="Recipient's username" aria-describedby="basic-addon2">
                  <span class="input-group-text bg-warning text-white" id="basic-addon2">Search</span>
                </div>
            </div>
            <div class="bg-white py-4 px-5 mt-4">
                <h5 class="border-bottom border-opacity-10 text-black-50 py-4">Category</h5>
                <p class="txt-black border-bottom border-opacity-10 pt-4 pb-2 text-decoration-none fw-bolder">Resaurant Foods(37)</a></p>
                <p class="txt-black border-bottom border-opacity-10 py-2 text-decoration-none fw-bolder">Travel News(45)</a></p>
                <p class="txt-black border-bottom border-opacity-10 py-2 text-decoration-none fw-bolder">Model Technology(7)</a></p>
                <p class="txt-black border-bottom border-opacity-10 py-2 text-decoration-none fw-bolder">Product(34)</a></p>
                <p class="txt-black border-bottom border-opacity-10 py-2 text-decoration-none fw-bolder">Inspiration(12)</a></p>
                <p class="txt-black border-bottom border-opacity-10 py-2 text-decoration-none fw-bolder">Health Care(65)</a></p>
            </div>
            <div class="bg-white py-4 px-5 my-4">
                <h5 class="border-bottom border-opacity-10 text-black-50 py-4">Recent Post</h5>
                <div class="d-flex pt-5 pb-4">
                    <img src="{{ asset('images/blog1.webp') }}" class="feedImg " >
                    <div class="d-flex align-items-center">
                        <div class="ps-4">
                            <h6 class="txt">From Life was your fish..</h6>
                            <p class="fw-bolder">January 12, 2019</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex pb-4">
                    <img src="{{ asset('images/blog2.jpg') }}" class="feedImg " >
                    <div class="d-flex align-items-center">
                        <div class="ps-4">
                            <h6 class="txt">The amazing Hubble.</h6>
                            <p class="fw-bolder">02 Hours ago</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex pb-4">
                    <img src="{{ asset('images/blog3.jpg') }}" class="feedImg " >
                    <div class="d-flex align-items-center">
                        <div class="ps-4">
                            <h6 class="txt">Happy Life Passing Through</h6>
                            <p class="fw-bolder">03 Hours ago</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex pb-4">
                    <img src="{{ asset('images/blog4.jpg') }}" class="feedImg " >
                    <div class="d-flex align-items-center">
                        <div class="ps-4">
                            <h6 class="txt">Make cake with Emily..</h6>
                            <p class="fw-bolder">01 Hours ago</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white py-4 px-5 mt-4">
                <h5 class="border-bottom border-opacity-10 text-black-50 py-4">Tag Clouds</h5>
                <div class="pt-4">
                    <button class="btn btn-outline-warning my-2 mx-1">project</button>
                    <button class="btn btn-outline-warning my-2 mx-1">love</button>
                    <button class="btn btn-outline-warning my-2 mx-1">technology</button>
                    <button class="btn btn-outline-warning my-2 mx-1">travel</button>
                    <button class="btn btn-outline-warning my-2 mx-1">resaurant</button>
                    <button class="btn btn-outline-warning my-2 mx-1">lifestyle</button>
                    <button class="btn btn-outline-warning my-2 mx-1">design</button>
                    <button class="btn btn-outline-warning my-2 mx-1">illustration</button>
                </div>
            </div>
            <div class="bg-white py-4 px-5 mt-4">
                <h5 class="border-bottom border-opacity-10 text-black-50 py-4">Instagram Feeds</h5>
                <div class="pt-4">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('images/feed1.jpg') }}" class="feedImgBig py-2 msn">
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('images/feed2.jpg') }}" class="feedImgBig py-2 msn" >
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('images/feed3.jpg') }}" class="feedImgBig py-2 msn">
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('images/feed4.jpg') }}" class="feedImgBig py-2 msn">
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('images/feed5.jpg') }}" class="feedImgBig py-2 msn">
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('images/feed6.webp') }}" class="feedImgBig py-2 msn">
                        </div>
                    </div>
                </div>
            </div>
             <div class="bg-white py-4 px-5 mt-4">
                <h5 class="border-bottom border-opacity-10 text-black-50 py-4">Newsletter</h5>
                <div class="pt-5">
                    <form action="">
                        <input type="email" placeholder="Enter your email" class="form-control mb-3">
                        <button type="submit" class="btn btn-online w-100">SUBSCRIBE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end blogs --}}
@endsection
