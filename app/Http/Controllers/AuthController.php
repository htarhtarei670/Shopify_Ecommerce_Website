<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class AuthController extends Controller
{
    public function loginPage(){
        return view('login');
    }

    //direct register page
    public function registerPage(){
        return view('register');
    }

    //-----user-----
    //direct user home page
    public function homePage(){
        $maylike=Product::where('seperate','new')->get();
        $trendProduct=Product::get();
        return view('users.user.home',compact('maylike','trendProduct'));
    }

     //direct user contact us page
    public function contactUsPage(){
        return view('users.user.contactUs');
    }

    //direct user blog page
    public function blogPage(){
        return view('users.user.blog');
    }

     //to seperate admin's and user's process
    public function dashboard(){
        if(Auth::user()->role=='admin'){
            return redirect()->route('admin#category');
        }else{
            return redirect()->route('user#homePage');
        }
    }


}