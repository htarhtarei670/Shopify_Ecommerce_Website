@extends('admin.layouts.main')

@section('content')
    <div>
        <div class="top">
            <h3 class='sub-header'>User List</h3>
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

            <div class="table">
                @if (count($user) !=0)
                    <table class="col-11">
                        <tr>
                            <th class="col-2">Image</th>
                            <th class="col-2">Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="col-3">Created Date</th>
                            <th class="offset-2 col-1"></th>
                        </tr>
                        @foreach ($user as $u)
                            <tr>
                                <td>
                                    <input type="hidden" name="userId" value="{{ $u->id }}" class="userId">
                                     @if ($u->image==null && $u->gender=='female')
                                        <img src="{{ asset('images/user.webp') }}" style='width:60px;height:50px'>
                                    @elseif ($u->image==null && $u->gender=='male')
                                        <img src="{{ asset('images/user-male.jpg') }}"  style='width:60px;height:50px'>
                                    @else
                                        <img src="{{ asset('storage/'.$u->image)}}" style='width:60px;height:50px'>
                                    @endif
                                </td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>
                                    <select name="" class="form-control role">
                                        <option value="admin" @if($u->role == 'admin') selected @endif>admin</option>
                                        <option value="user" @if($u->role == 'user') selected @endif>user</option>
                                    </select>
                                </td>
                                <td>{{ $u->created_at->format('d-F-Y') }}</td>
                                <td>
                                    <div class="action">
                                        <a href="{{ route('admin#userListDetailPage',$u->id) }}" class="text-decoration-none" title="View Detail">
                                            <i class="fa-regular fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <h1 class="text-danger text-center fs-2">There is no user yet!🫡</h1>
                @endif
            </div>
        </div>
    </div>
@endsection
