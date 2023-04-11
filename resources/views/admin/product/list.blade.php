@extends('admin.layouts.main')

@section('content')
        <div class="top">
            <h3 class='sub-header'>Product List</h3>
           <div>
                <a href="{{ route('admin#productCreatepage') }}">
                    <button class="add-btn">
                        <i class="fa-solid fa-plus pe-2"></i>Add to product
                    </button>
                </a>

                <a href="{{ route('admin#productSubCreatePage') }}">
                    <button class="add-btn">
                        <i class="fa-solid fa-plus pe-2"></i>Add to Sub Product
                    </button>
                </a>
           </div>
        </div>
        <div class="container table-list">
            <div class=" col-6 offset-5 my-5">
                <div class="mt-5 offset-2 col-9">
                    <form action="{{ route('admin#productList') }}" method="get">
                        @csrf
                        <input type="text" name="searchKey" class="input" placeholder="Search.." value="{{ request('searchKey') }}">
                        <button class="search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                @if (session('createSuccess'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <i class="fa-regular fa-circle-check pe-2"></i> {{ session('createSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('updateSuccess'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <i class="fa-regular fa-circle-check pe-2"></i> {{ session('updateSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('deleteSuccess'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <i class="fa-regular fa-circle-check pe-2"></i> {{ session('deleteSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

            </div>

            <div class="table">
                @if (count($product) !=0)
                    <table class="col-11">
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Old or New</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                        @foreach ($product as $p)
                            <tr>
                                <input type="hidden" name="productId" id='productId' value="{{ $p->id }}">
                                <td class="text-center">{{ $p->id }}</td>
                                {{-- <td></td> --}}
                                <td>
                                    @if ($p->image !=null)
                                        <img src="{{ asset('storage/'.$p->image) }}" style="width: 100px;height:100px">
                                    @else
                                        <img src="{{ asset('images/img-not-found.png') }}" style="width: 100px;height:100px">
                                    @endif
                                </td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->price }}</td>
                                <td>
                                    <select name="" class="form-control col-1 seperate">
                                        <option value="new" @if($p->seperate == 'new') selected @endif>New</option>
                                        <option value="old" @if($p->seperate == 'old') selected @endif>Old</option>
                                    </select>
                                </td>
                                <td>{{ $p->created_at->format('d-F-Y') }}</td>
                                <td>
                                    <div class="action">
                                        <a href="{{ route('admin#editPage',$p->id) }}" class="text-decoration-none" title="View Detail">
                                            <i class="fa-regular fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin#updatePage',$p->id) }}" class="text-decoration-none" title="Edit Detail">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="{{ route('admin#productDelete',$p->id) }}" title="Delete">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <h1 class="text-danger text-center fs-2">There is no products yet!🫡</h1>
                @endif
            </div>
            <div class="mt-3">{{ $product->links() }}</div>
        </div>
@endsection

@section('scriptSource')
    <script>
        // to change seperate
        $(document).ready(function(){
            $('.seperate').change(function(){
               $parentNode=$(this).parents('tr');
               $seperate=$parentNode.find('.seperate').val();
               $productId=$parentNode.find('#productId').val();
               $data={
                'productId':$productId,
                'seperate':$seperate
               }

                $.ajax({
                    type:'get',
                    url:'http://127.0.0.1:8000/admin/product/separate/change',
                    data:$data,
                    dataType:'json',
                    success:function(){

                    }
                })
                location.reload();
            })
            $('.trend').change(function(){
               $parentNode=$(this).parents('tr');
               $trend=$parentNode.find('.trend').val();
               $productId=$parentNode.find('#productId').val();
               $data={
                'productId':$productId,
                'trend':$trend
               }

                $.ajax({
                    type:'get',
                    url:'http://127.0.0.1:8000/admin/product/separate/change',
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
