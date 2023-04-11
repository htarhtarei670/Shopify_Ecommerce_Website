<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //direct user account page
    public function userAccountPage($id){
        $user=User::where('id',$id)->first();
        return view('users.account.detail',compact('user'));
    }

    //direct user account update page
    public function userAccountUpdatePage($id){
        $update=User::where('id',$id)->first();
        return view('users.account.edit',compact('update'));
    }

    //account update process
    public function userAccountUpdateProcess(Request $request){
        $this->valiAccountData($request);
        $updateData=$this->getAccountData($request);

        if($request->hasFile('userImage')){
            $oldImage=User::where('id',$request->userId)->first();
            $oldImage=$oldImage->image;

            if($oldImage !=null){
                Storage::delete('public',$oldImage);
            }

            $newImage=uniqid() .$request->file('userImage')->getClientOriginalName();
            $request->file('userImage')->storeAs('public/'.$newImage);
            $updateData['image']=$newImage;
        }
       User::where('id',$request->userId)->update($updateData);
       return redirect()->route('user#homePage');
    }

    //direct password change page
    public function userPasswordChangePage(){
        return view('users.password.change');
    }

    //password change process
    public function userPasswordChangeProcess(Request $request){
        $this->valiPasswordData($request);
        $u=User::select('password')-> where('id',Auth::user()->id)->first();
        $dbPassword=$u->password;
        $userOldPasssword=$request->oldPassword;

        if(Hash::check($userOldPasssword, $dbPassword)){
          $change=[
            'password'=>Hash::make($request->newPassword),
          ];
        User::where('id',Auth::user()->id)->update($change);
        return back()->with(['changeSuccess'=>'Password changed successfully']);
        };
        return back()->with(['changeFail'=>'Something wrong ..Try again']);
    }

    //user contact data store
    public function contactDataStore(Request $request){
        $this->valiContactData($request);
        $userContact=$this->getContactData($request);
        Contact::create($userContact);
        return back()->with(['sendSuccess'=>'We got your message.Thanks for sending message']);
    }

    //-----------private function area----------
    private function valiAccountData($request){
        $vali=[
            'name'=>'required|unique:users,name,'.$request->userId,
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'gender'=>'required',
            'userImage'=>'mimes:jpeg,bmp,png,jpg,webp'
        ];

        Validator::make($request->all(),$vali)->validate();
    }

    //get account update data
    private function getAccountData($request){
        return[
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'gender'=>$request->gender,
            'image'=>$request->userImage,
        ];
    }

    //vali password change process
    private function valiPasswordData($request){
        $vali=[
            'oldPassword'=>'required|min:4,',
            'newPassword'=>'required|min:4|same:confrimPassword,',
            'confrimPassword'=>'required|min:4|same:newPassword,',
        ];
        Validator::make($request->all(),$vali)->validate();
    }

    //vali user contact data
    private function valiContactData($request){
        $vali=[
            'name'=>'required|min:4',
            'email'=>'required',
            'message'=>'required',
        ];
        Validator::make($request->all(),$vali)->validate();
    }

    //get user contact data
    private function getContactData($request){
        return[
            'user_name'=>$request->name,
            'user_email'=>$request->email,
            'message'=>$request->message,
        ];
    }


}