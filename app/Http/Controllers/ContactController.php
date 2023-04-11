<?php

namespace App\Http\Controllers;
use App\Models\Contact;


use Illuminate\Http\Request;

class ContactController extends Controller
{
    //direct contact list page for admin side
    public function contactListPage(){
        $message=Contact::when(request('searchKey'),function($p){
            $key=request('searchKey');
            $p->orWhere('user_name','like','%'.$key.'%')
              ->orWhere('user_email','like','%'.$key.'%');
        })
            ->get();
        return view('admin.comment.list',compact('message'));
    }

    //direct comment detail page
    public function detailPage($id){
        $message=Contact::where('id',$id)->first();
        return view('admin.comment.detail',compact('message'));
    }

    //delete user comment for admin side
    public function commentDelete($id){
        Contact::where('id',$id)->first()->delete();
        return back()->with(['deleteSuccess'=>'You banned customer comment successfully']);
    }
}