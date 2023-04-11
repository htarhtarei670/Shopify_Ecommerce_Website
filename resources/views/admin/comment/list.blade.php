@extends('admin.layouts.main')

@section('content')
        <div class="top">
            <h3 class='sub-header'>Product List</h3>
        </div>
        <div class="container table-list">
            <div class=" col-6 offset-5 my-5">
                <div class="mt-5 offset-2 col-9">
                    <form action="" method="get">
                        @csrf
                        <input type="text" name="searchKey" class="input" placeholder="Search.." value="{{ request('searchKey') }}">
                        <button class="search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>

               <div class="offset-2 col-8 mt-3">
                    @if (session('deleteSuccess'))
                        <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                            <i class="fa-regular fa-circle-check pe-2"></i> {{ session('deleteSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
               </div>

            </div>

            <div class="table">
                {{-- @if (count($product) !=0) --}}
                    <table class="col-11">
                        <tr>
                            <th class="col-2">No</th>
                            <th class="col-2">User Name</th>
                            <th class="col-2">User Email</th>
                            <th class="col-3">Message</th>
                            <th class="col-2"></th>
                        </tr>
                        @foreach ($message as $m)
                            <tr>
                                <td class="col-2">{{ $m->id }}</td>
                                <td class="col-2">{{ $m->user_name }}</td>
                                <td class="col-2">{{ $m->user_email }}</td>
                                <td class="col-3">{{Str::words( $m->message, 4, ' ...') }}</td>
                                <td class="col-2">
                                    <div class="action">
                                         <a href="{{ route('admin#commentDetailPage',$m->id) }}" class="text-decoration-none" title="View Detail">
                                            <i class="fa-regular fa-eye"></i>
                                        </a>

                                        <a href="{{ route('admin#commentDelete',$m->id) }}" class="text-decoration-none" title="Ban">
                                            <i class="fa-solid fa-ban"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                {{-- @else
                    <h1 class="text-danger text-center fs-2">There is no products yet!🫡</h1>
                @endif --}}
            </div>
        </div>
@endsection

