<?php

namespace App\Http\Controllers\Ajax;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //change seperate change
    public function productSeperateChange(Request $request){
        $seperate=['seperate'=>$request->seperate];
        Product::where('id',$request->productId)->first()->update($seperate);
    }

    //direct account detail page
    public function accountDetailPage($id){
        $user=User::where('id',$id)->first();
        return view('admin.account.detail',compact('user'));
    }

    //direct account update page
    public function accountUpdatePage($id){
        $update=User::where('id',$id)->first();
        return view('admin.account.update',compact('update'));
    }

    //account update process
    public function accountUpdateProcess(Request $request){
       $this->valiAccountData($request);
       $update=$this->getAccountData($request);

       if($request->hasFile('userImage')){
            $oldImage=User::where('id',Auth::user()->id)->first();
            $oldImage=$oldImage->image;

            if($oldImage !=null)
            {
                Storage::delete('public',$oldImage);
            }
            $newImage=uniqid() . $request->file('userImage')->getClientOriginalName();
            $request->file('userImage')->storeAs('public/'.$newImage);
            $update['image']=$newImage;
       }
       User::where('id',Auth::user()->id)->update($update);
       return redirect()->route('admin#category');
    }

    //direct admin list page
    public function adminListPage(){
        $admin=User::when(request('searchKey'),function($p){
            $key=request('searchKey');
            $p->where('name','like','%'.$key.'%');
        })  ->where('role','admin')
            ->get();
        return view('admin.account.adminList',compact('admin'));
    }

    //admin list role change
    public function adminListRoleChange(Request $request){
        $role=[
            'role'=>$request->role
        ];
        $user= User::where('id',$request->userId)->update($role);
    }

    //direct admin password change page
    public function adminPasswordChangePage(){
        return view('admin.account.passwordChange');
    }

    //admin password change process
    public function adminPasswordChangProcess(Request $request){
        // $this->valiPassword($request);

        $oldUserData=User::where('id',Auth::user()->id)->first();
        $oldPassword=$oldUserData->password;
        $userOldPassword=$request->oldPassword;

        if(Hash::check($userOldPassword,$oldPassword)){
            $change=['password'=>Hash::make($request->newPassword)];
            User::where('id',Auth::user()->id)->update($change);
            return back()->with(['changeSuccess'=>'Password changed successfully']);
        };
        return back()->with(['changeFail'=>'Something wrong ..Try again']);
    }

     // ---------user list--------
    //direct user list page
    public function userListPage(){
        $user=User::when(request('searchKey'),function($p){
            $key=request('searchKey');
            $p->where('name','like','%'.$key.'%')
              ->where('role','user');
        })
            ->where('role','user')
            ->get();
        return view('admin.userList.list',compact('user'));
    }

    //direct user list detail page
    public function useListDetailPage($id){
        $user=User::where('id',$id)->first();
        return view('admin.userList.detail',compact('user'));
    }

    //user list role change
    public function userListRoleChange(Request $request){
        $role=[
            'role'=>$request->role
        ];
       User::where('id',$request->userId)->first()->update($role);
    }

    //-----private function area-------------
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
            ];
        }

        //password change
        private function valiPassword($request){
            $vali=[
                'oldPassword'=>'required|min:4',
                'newPassword'=>'required|min:4|same:confrimPassword',
                'confrimPassword'=>'required|min:4|same:newPassword'
            ];
            Validator::make($request->all(),$vali)->validate();
        }

    }