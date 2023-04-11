@extends('users.layouts.main')

@section('content')
<div class="container-fluid pt-5 px-5">
    <div class="row">
        <div class="col-8">
            <div class="table">
                 <table class="row" id='dataTable'>
                    <thead>
                        <tr class="text-center">
                            <th class="col-2 pe-5">Image</th>
                            <th class="col-2">Product</th>
                            <th class="col-1">Price</th>
                            <th class="col-2 pe-5">Quatity</th>
                            <th class="col-2">Total</th>
                            <th class="col-1">Cancel</th>
                        </tr>
                    </thead>
                   @foreach ($cart as $c)
                        <tbody>
                            <tr>
                                {{-- input hidden area --}}
                                <input type="hidden" id="userId" value={{ Auth::user()->id }}>
                                <input type="hidden" id="productId" value="{{ $c->product_id }}">
                                <input type="hidden" id="productSize" value="{{ $c->size }}">

                                <td class="col-2">
                                    <img src="{{asset('storage/'.$c->product_image)}}" style="width:75%;height:90px">
                                </td>
                                <td class="col-2 text-center">{{ $c->product_name }}</td>
                                <td class="col-1 text-center" id="price-{{ $c->id }}" >{{ $c->product_price }}</td>
                                <td class="col-2 text-center">
                                    <div class="ps-3 qty-box">
                                        <button class="minus" data-id="{{ $c->id }}"><i class="fa-solid fa-minus"></i></button>
                                        <input type="text" class="qty" id="quantity-{{ $c->id }}" readonly value="{{ $c->qty }}">
                                        <button class="plus" data-id="{{ $c->id }}"><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </td>
                                <td class="col-2 text-center total" id="total-{{ $c->id }}">{{ $c->product_price }}</td>
                                <td class="col-1 text-center">
                                    <a href="{{ route('user#removeAcart',$c->id) }}">
                                        <i class="fa-solid fa-square-xmark text-danger fs-2"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                   @endforeach
                </table>

                <div class="mt-5 pb-3">{{ $cart->links() }}</div>
            </div>
        </div>
        <div class="col-4">
            <h2 class=" pb-3 text-uppercase">Cart Summary</h2>
            <div class="detail-box-container">
                <div class="detail-box">
                     <p class="row">
                        <span class=" offset-1 col-4">Sub Total</span>
                        <span class=" offset-3 col-2" id='surTotal'>{{ $total }}</span>
                    </p>
                    <p class="row">
                        <span class=" offset-1 col-4">Delivery Fee</span>
                        <span class=" offset-3 col-2">
                            @if ($total==0)
                                0
                            @else
                                1000
                            @endif
                        </span>
                    </p>
                    <hr>
                    <p class="row fs-5 fw-3">
                        <span class=" offset-1 col-4">Total</span>
                        <span class=" offset-3 col-2" id='finalTotal'>
                            @if ($total !=0)
                             {{ $total + 1000 }}
                            @else
                                0
                           @endif
                        </span>
                    </p>
                    <hr>
                    <div class="d-flex justify-content-center px-5">
                        <button class="btn btn-danger w-100" id='checkBtn'>Procceed To Checkout</button>
                    </div>
                    <div class="d-flex justify-content-center px-5 mt-3">
                        <button class="btn btn-secondary w-100" id='clearBtn'>Clear All Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scriptSource')
    <script>
        let plusBtns=document.querySelectorAll('.plus');
        let minusBtns=document.querySelectorAll('.minus');

        plusBtns.forEach(plusBtn =>{
            plusBtn.addEventListener('click',()=>{
                const id = plusBtn.getAttribute('data-id');
                const quantityInput = document.querySelector(`#quantity-${id}`);
                const totalPriceElement = document.querySelector(`#total-${id}`);
                const price=document.querySelector(`#price-${id}`).innerHTML;
                const surTotal=document.querySelector('#surTotal');
                const finalTotal=document.querySelector('#finalTotal');

                quantityInput.value = parseInt(quantityInput.value) + 1;
                totalPriceElement.innerHTML = (parseInt(price) * quantityInput.value);
                surTotal.innerHTML=(parseInt(surTotal.innerHTML)  + parseInt(price));
                finalTotal.innerHTML=(parseInt(finalTotal.innerHTML)  + parseInt(price));

            })
        })

        minusBtns.forEach(minusBtn =>{
            minusBtn.addEventListener('click',()=>{
                const id = minusBtn.getAttribute('data-id');
                const quantityInput = document.querySelector(`#quantity-${id}`);
                const totalPriceElement = document.querySelector(`#total-${id}`);
                const price=document.querySelector(`#price-${id}`).innerHTML;
                const surTotal=document.querySelector('#surTotal');
                const finalTotal=document.querySelector('#finalTotal');

                    if (quantityInput.value <= 0) {
                        quantityInput.value == 0

                    } else {
                        quantityInput.value = parseInt(quantityInput.value) - 1;
                        totalPriceElement.innerHTML=(parseInt(price) *quantityInput.value)
                        surTotal.innerHTML=(parseInt(surTotal.innerHTML)  - parseInt(price));
                        finalTotal.innerHTML=(parseInt(finalTotal.innerHTML)  + parseInt(price));

                    }
            })
        })

    </script>

    <script>
        $(document).ready(function(){
            //when we click clear btn
            $('#clearBtn').click(function(){
                $('#dataTable tbody tr').remove();

                $.ajax({
                    type:'get',
                    url:'http://127.0.0.1:8000/user/order/remove/allcart',
                    dataType:'json',
                    success:function($response){
                        if($response.status =='true'){
                            window.location.href='http://127.0.0.1:8000/order/page'
                        }
                    }
                })
            })

            //when we click check Btn
            $('#checkBtn').click(function(){
                $random=Math.floor(Math.random() * 1000000000);
                $data=[];

                $('#dataTable tbody tr').each(function(index,row){
                    $data.push({
                        'userId':$(row).find('#userId').val(),
                        'productId':$(row).find('#productId').val(),
                        'productSize':$(row).find('#productSize').val(),
                        'productQty':$(row).find('.qty').val(),
                        'total':Number($(row).find('.total').text()),
                        'orderCode': 'POS'+$random
                    })

                })

                $.ajax({
                    type:'get',
                    url:'http://127.0.0.1:8000/user/order/add/all/cart',
                    data:Object.assign({}, $data),
                    dataType:'json',
                    success:function(){

                    }
                })
                location.reload();
            })
        })
    </script>
@endsection

