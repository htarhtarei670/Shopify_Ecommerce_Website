@extends('admin.layouts.main')

@section('content')
    <div>
        <div class="top">
            <h3 class='sub-header'>Admin List</h3>
        </div>
        <div class="container table-list">
            <div class=" col-6 offset-6 my-5">
                <div class="mt-5 offset-2 col-9">
                    <form action="{{route('admin#listPage') }}" method="get">
                        @csrf
                        <input type="text" name="searchKey" class="input" placeholder="Search.." value="{{ request('searchKey') }}">
                        <button class="search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
            </div>

            <div class="table">
                    <table class="col-11">
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created_Date</th>
                            <th></th>
                        </tr>
                        @foreach ($admin as $a)
                            <tr>
                                <td>{{ $a->id }}</td>
                                <td>
                                    @if ($a->image==null && $a->gender=='female')
                                        <img src="{{ asset('images/user.webp') }}" style='width:60px;height:50px'>
                                    @elseif ($a->image==null && $a->gender=='male')
                                        <img src="{{ asset('images/user-male.jpg') }}"  style='width:60px;height:50px'>
                                    @else
                                        <img src="{{ asset('storage/'.$a->image)}}" style='width:60px;height:50px'>
                                    @endif
                                </td>
                                <td>{{ $a->name }}</td>
                                <td>{{ $a->email }}</td>
                                <td>
                                    <select name="" class="form-control role">
                                        <option value="admin" @if($a->role == 'admin') selected @endif>admin</option>
                                        <option value="user" @if($a->role == 'user') selected @endif>user</option>
                                    </select>
                                    <input type="hidden" name="userId" id='userId' value="{{ $a->id }}">
                                </td>
                                <td>{{ $a->created_at->format('d-F-Y') }}</td>
                                <td>
                                   {{-- @if ()

                                   @endif --}}
                                   @if ($a->id ==Auth::user()->id)

                                   @else
                                        <div class="action">
                                            <a href="{{ route('admin#accountDetailPage',$a->id) }}" class="text-decoration-none" title="View Detail">
                                                <i class="fa-regular fa-eye"></i>
                                            </a>
                                        </div>
                                   @endif
                                </td>
                            </tr>
                        @endforeach

                    </table>
            </div>
        </div>
    </div>
@endsection

@section('scriptSource')
    <script>
        $(document).ready(function(){
            $('.role').change(function(){
                $parentNode=$(this).parents('tr');
                $role=$parentNode.find('.role').val();
                $userId=$parentNode.find('#userId').val();

                $data={
                    'role':$role,
                    'userId':$userId
                }

                $.ajax({
                    type:'get',
                    url:'http://127.0.0.1:8000/admin/account/adminList/role/change',
                    data:$data,
                    success:function(){

                    }
                })
                location.reload();
            })
        })
    </script>
@endsection


