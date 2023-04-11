@extends('users.layouts.main')

@section('content')
<div class="container-fluid pt-5 px-5" style="height: 500px">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="table">
                 <table class="row" id='dataTable'>
                    <thead>
                        <tr class="text-center text-dark">
                            <th class=" col-2">Orderd Date</th>
                            <th class=" col-2">Order Code</th>
                            <th class=" col-2">Total Price</th>
                            <th class=" col-2">Status</th>
                        </tr>
                    </thead>
                    @foreach ($order as $o)
                        <tbody>
                            <tr class="text-center">
                                <td class=" col-2">{{ $o->created_at->format('d-F-Y') }}</td>
                                <td class=" col-2">{{ $o->order_code }}</td>
                                <td class=" col-2">${{ $o->total_price }}</td>
                                <td class=" col-2">
                                    @if ($o->status == '0')
                                        <span class="text-warning"><i class="fa-solid fa-clock-rotate-left pe-1"></i>pending...</span>
                                    @elseif ($o->status == '1')
                                        <span class="text-success"><i class="fa-solid fa-check-double pe-1"></i> success</span>
                                    @else
                                        <span class="text-danger"><i class="fa-solid fa-triangle-exclamation pe-1"></i> reject</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    @endforeach

                </table>

                {{-- <div class="mt-5 pb-3">{{ $cart->links() }}</div> --}}
            </div>
        </div>
    </div>
</div>
@endsection


