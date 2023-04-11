<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //add data cart data
    public function addCart(Request $request){
       $cart=$this->getCartData($request);
       Cart::create($cart);

       $reponse=[
        'status'=>'true'
       ];
       return response()->json($reponse, 200);
    }

    //---------private area---------
    //get cart data
    private function getCartData($request){
        return[
            'user_id'=>$request->user_id,
            'product_id'=>$request->product_id,
            'product_image'=>$request->product_img,
            'qty'=>$request->qty,
            'size'=>$request->product_size
        ];
    }
}