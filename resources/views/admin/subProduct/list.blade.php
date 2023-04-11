@extends('admin.layouts.main')

@section('content')
    <div>
        <div class="top">
            <h3 class='sub-header'>Sub Product List</h3>
           <div>
                <a href="{{ route('admin#productSubCreatePage') }}">
                    <button class="add-btn">
                        <i class="fa-solid fa-plus pe-2"></i>Add to Sub Product
                    </button>
                </a>
           </div>
        </div>
        <div class="container table-list">
            <div class=" col-5 offset-6 my-5">
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
                @if (count($subProduct) !=0)
                    <table class="col-11">
                        <tr>
                            <th class="text-center">Id</th>
                            <th>Image</th>
                            <th>Main product Name</th>
                            <th></th>
                        </tr>
                        @foreach ($subProduct as $s)
                            <tr class="shadow-sm">
                                <td class="text-center col-2">{{ $s->id }}</td>
                                <td>
                                    @if ($s->image !=null)
                                        <img src="{{ asset('storage/'.$s->image) }}"  style="width: 100px;height:100px">
                                    @else
                                        <img src="{{ asset('images/img-not-found.png') }}"  style="width: 100px;height:100px">
                                    @endif
                                </td>
                                <td>{{ $s->product_name }}</td>
                                <td class="offset-1 col-2">
                                    <div class="action">
                                        <a href="{{ route('admin#productSubUpdatePage',$s->id) }}" class="text-decoration-none" title="Edit Detail">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="{{ route('admin#productSubDelete',$s->id) }}" title="Delete">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                <h1 class="text-danger text-center fs-2">There is no sub-products yet!🫡</h1>
                @endif
            </div>
        </div>
        <div class="pt-3">{{ $subProduct->links() }}</div>
    </div>
@endsection
