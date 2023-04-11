<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\OrderList;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    //direct user order page
    public function orderPage(){
        $cart=Cart::select('carts.*','products.name as product_name','products.price as product_price','products.id as product_id','products.image as productImage')
                    ->leftJoin('products','products.id','carts.product_id')
                    ->paginate(4);

        $cartList=Cart::select('carts.*','products.name as product_name','products.price as product_price')
                    ->leftJoin('products','products.id','carts.product_id')
                    ->get();

        $total=0;
        foreach($cartList as $c){
            $total+=$c->product_price * $c->qty;
        }
// dd($cart->toArray());
        $cart->appends(request()->all());
        return view('users.order.list',compact('cart','total'));
    }

    //user order remove a cord
    public function removeAcart($id){
        Cart::where('id',$id)->first()->delete();
        return back();
    }

    //user order remove all cart
    public function removeAllCart(){
        $cart=Cart::where('user_id',Auth::user()->id)->delete();
        $response=[
            'status'=>'true',
        ];
        return response()->json($response, 200);
    }

    //user order add all cart to orderlist table
    public function addAllCart(Request $request){
        $totalPrice=0;
        $orders=$request->all();

        foreach($orders as $o){
            $orderList=OrderList::create([
                'user_id'=>$o['userId'],
                'product_id'=>$o['productId'],
                'qty'=>$o['productQty'],
                'order_code'=>$o['orderCode'],
                'size'=>$o['productSize'],
                'total'=>$o['total'],
            ]);
            $totalPrice+=$orderList->total;
        }
        Cart::where('user_id',Auth::user()->id)->delete();
        Order::create([
            'user_id'=>Auth::user()->id,
            'order_code'=>$orderList['order_code'],
            'total_price'=>$totalPrice +1000,
        ]);
    }

    //direct user order list page
    public function orderListPage(){
        $order=Order::where('user_id',Auth::user()->id)->get();
        return view('users.order.listPage',compact('order'));
    }

    // -----------------admin------------
    //direct admin order list page
    public function adminOrderListPage(){
       $orders= Order::select('orders.*','users.name as user_name')
                    ->leftJoin('users','users.id','orders.user_id')
                    ->get();
       return view('admin.order.list',compact('orders'));
    }

    //admin side order status change
    public function orderStatusChange(Request $request){
        $status=['status'=>$request->status];
        $order=Order::where('id',$request->orderId)->first()->update($status);
    }

    //admin order status sorting
    public function orderStatusSorting(Request $request){
        if($request->sortingStatus ==null){
             $orders= Order::select('orders.*','users.name as user_name')
                        ->leftJoin('users','users.id','orders.user_id')
                        ->get();
        }else{
            $orders=Order::select('orders.*','users.name as user_name')
                        ->leftJoin('users','users.id','orders.user_id')
                        ->where('status',$request->sortingStatus)
                        ->get();
        }
        return view('admin.order.list',compact('orders'));
    }

    //add data to cart table with cart btn
    public function addCartBtn(Request $request){
        $data=$this->getAcartData($request);
        Cart::create($data);
    }

    //------------private area------------
    private function getAcartData($request){
        return[
            'product_id'=>$request->productId,
            'user_id'=>$request->userId,
            'product_image'=>$request->image,
        ];
    }
}