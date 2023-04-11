@extends('admin.layouts.main')

@section('content')
        <div class="top">
            <h3 class='sub-header'>Category List</h3>
            <a href="{{ route('admin#categoryCreate') }}">
                <button class="add-btn">
                    <i class="fa-solid fa-plus pe-2"></i>Add to category
                </button>
            </a>
        </div>
        <div class="container table-list">
            <div class="col-6 offset-6 my-5">
                <div class="mt-5 offset-2 col-8">
                    <form action="{{ route('admin#category') }}" method="get" class="d-flex">
                        @csrf
                        <input type="text" name="searchKey" class="input" placeholder="Search.." value="{{ request('searchKey') }}">
                        <button class="search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                @if (session('createSuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa-regular fa-circle-check pe-2"></i> {{ session('createSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('updateSuccess'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="fa-regular fa-circle-check pe-2"></i> {{ session('updateSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('deleteSuccess'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="fa-regular fa-circle-check pe-2"></i> {{ session('deleteSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            <div class="table row">
                @if (count($category) !=0)
                    <table class="col-11">
                        <tr>
                            <th class="col-2">Category Id</th>
                            <th class="col-3">Category Name</th>
                            <th class="col-3">Created Date</th>
                            <th class="offset-2 col-2"></th>
                        </tr>
                        @foreach ($category as $c)
                            <tr class="shadow-sm">
                                <td class="col-2">{{ $c->id }}</td>
                                <td class="col-3">{{ $c->name }}</td>
                                <td class="col-3">{{ $c->created_at->format('D-M-Y') }}</td>
                                <td class="offset-2 col-2">
                                    <div class="action">
                                        <a href="{{ route('admin#categoryEditPage',$c->id) }}" class="text-decoration-none">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="{{ route('admin#categoryDelete',$c->id) }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <h1 class="text-danger text-center fs-2">There is no category yet!🫡</h1>
                @endif
            </div>
        </div>
@endsection
