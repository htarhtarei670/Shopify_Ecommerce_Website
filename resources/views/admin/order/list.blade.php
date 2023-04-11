@extends('admin.layouts.main')

@section('content')
<div class="top">
    <h3 class='sub-header'>Order List</h3>
</div>
<div class="container table-list">
    <div class=" col-6 offset-5 my-5">
        <div class="mt-5 offset-2 col-9">
            <form action="{{ route('admin#orderStatusSorting') }}" method="get">
                @csrf
                <select name="sortingStatus" class="input">
                    <option value="">All</option>
                    <option value="0" @if(request('sortingStatus')=='0')selected @endif>Pending</option>
                    <option value="1" @if(request('sortingStatus')=='1')selected @endif>Success</option>
                    <option value="2" @if(request('sortingStatus')=='2')selected @endif>Reject</option>
                </select>
                <button class="search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>

    <div class="table">
        @if (count($orders) !=0)
        <table class="col-11">
            <tr>
                <th>Id</th>
                <th>Customer Name</th>
                <th>Order Code</th>
                <th>Order Date</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
            @foreach ($orders as $o)
                <tr>
                    <input type="hidden" class="orderId" value="{{ $o->id }}">
                    <td >{{ $o->id }}</td>
                    <td>{{ $o->user_name}}</td>
                    <td>{{ $o->order_code }}</td>
                    <td>{{ $o->created_at->format('d-F-y') }}</td>
                    <td>${{ $o->total_price }}</td>
                    <td>
                        <select name="" class=" form-control status">
                            <option value="0" @if($o->status =='0')  selected @endif>Pending</option>
                            <option value="1" @if($o->status =='1')  selected @endif>Success</option>
                            <option value="2" @if($o->status =='2')  selected @endif>Reject</option>
                        </select>
                    </td>
                </tr>
            @endforeach
        </table>
        @else
            <h1 class="text-danger text-center fs-2">There is no order yet!🫡</h1>
        @endif
    </div>
</div>
@endsection

@section('scriptSource')
    <script>
        $(document).ready(function(){
            $('.status').change(function(){
                $parentNode=$(this).parents('tr');
                $status=$parentNode.find('.status').val();
                $orderId=$parentNode.find('.orderId').val();
                console.log($orderId);
                $data={
                    'status':$status,
                    'orderId':$orderId
                }

                $.ajax({
                    type:'get',
                    url:'http://127.0.0.1:8000/admin/order/status/change',
                    data:$data,
                    dataType:'json',
                    success:function(){

                    }
                })
                location.reload();
            });

        })
    </script>
@endsection

