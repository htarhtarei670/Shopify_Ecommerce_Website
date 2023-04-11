<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //direct admin product list
    public function productListPage(){
        $product=Product::paginate(4);
        $product->appends(request()->all());
        return view('admin.product.list',compact('product'));
    }

    //direct admin product create page
    public function productCreatePage(){
        $category=Category::get();
        return view('admin.product.create',compact('category'));
    }

    //admin product create process
    public function productCreateProcess(Request $request){
        $vali=$this->valiProductData($request);
        $product=$this->getProductData($request);

        if($request->hasFile('productImage')){
            $productPhoto=uniqid().$request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->storeAs('public/'.$productPhoto);
            $product['image']=$productPhoto;
        }
        Product::create($product);
        return redirect()->route('admin#productList')->with(['createSuccess'=>'Product created successfully']);

    }

    //direct product edit page
    public function productEditPage($id){
        $read=Product::select('products.*','categories.name as category_name')
                        ->leftJoin('categories','categories.id','products.category_id')
                        ->where('products.id',$id)->first();
        return view('admin.product.edit',compact('read'));
    }

    //admin update page
    public function productupdatePage($id){
        $category=Category::get();
        $update=Product::select('products.*','categories.name as category_name')
                    ->leftJoin('categories','categories.id','products.category_id')
                    ->where('products.id',$id)
                    ->first();
        return view('admin.product.update',compact('update','category'));
    }

    //admin update process
    public function productUpdateProcess(Request $request){
        $this->valiProductData($request);
        $updateData=$this->getProductData($request);

        if($request->hasFile('productImage')){
            $product=Product::where('id',$request->productId)->first();
            $oldImage=$product->image;

            if($oldImage !=null){
                Storage::delete('public',$oldImage);
            }
            $newImage=uniqid().$request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->storeAs('public',$newImage);
            $updateData['image']=$newImage;
        }
        Product::where('id',$request->productId)->update($updateData);
        return redirect()->route('admin#productList')->with(['updateSuccess'=>'product updated successfully']);
    }

    //delete product
    public function productDelete($id){
       Product::where('id',$id)->first()->delete();
       SubProduct::where('product_id',$id)->delete();

       return back()->with(['deleteSuccess'=>'product deleted successfully']);
    }

    // -----------sub product------------------
    //direct sub product list page
    public function productSubListPage(){
        $subProduct=SubProduct::select('sub_products.*','products.name as product_name')
                                ->leftJoin('products','products.id','sub_products.product_id')
                                ->paginate(4);
        $subProduct->appends(request()->all());
        return view('admin.subProduct.list',compact('subProduct'));
    }


    //direct sub product create page
    public function productSubCreatePage(){
        $product=Product::get();
        return view('admin.subProduct.create',compact('product'));
    }

    // sub product create process
    public function productSubCreateProcess(Request $request){
        $this->valiSubProductData($request);
        $subProduct=$this->getSubProductData($request);

        if($request->hasFile('productImage')){
            $productPhoto=uniqid().$request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->storeAs('public/',$productPhoto);
            $subProduct['image']=$productPhoto;
        }
        SubProduct::create($subProduct);
        return redirect()->route('admin#productList')->with(['createSuccess'=>'Subproduct created successfully']);
    }

    //direct sub product update page
    public function productSubUpdatePage($id){
        $subProduct=SubProduct::where('id',$id)->first();
        $product=Product::get();
        return view('admin.subProduct.edit',compact('subProduct','product'));
    }

    //sub product update process
    public function productSubUpdateProcess(Request $request){
        $this->valiSubProductData($request);
        $updateSub=$this->getSubProductData($request);

        // dd($updateSub);
        if($request->hasFile('productImage')){
            $product=SubProduct::where('id',$request->subProductId)->first();
            $oldImage=$product->image;

             if($oldImage !=null){
                Storage::delete('public',$oldImage);
             }
             $newImage=uniqid().$request->file('productImage')->getClientOriginalName();
             $request->file('productImage')->storeAs('public/',$newImage);
             $updateSub['image']=$newImage;
        }
        SubProduct::where('id',$request->subProductId)->update($updateSub);
        return redirect()->route('admin#productSubListPage')->with(['updateSuccess'=>'Subproduct updated successsfully']);

    }

    //sub product delete
    public function productSubDelete($id){
        SubProduct::where('id',$id)->delete();
        return redirect()->route('admin#productSubListPage')->with(['deleteSuccess'=>'A sub product deleted successfully']);
    }

    // -----------user--------
    //direct user shop page
    public function shopPage(){
        $category=Category::get();
        $product=Product::get();
        $cart=Cart::where('user_id',Auth::user()->id)->get();

        return view('users.user.shop',compact('category','product','cart'));
    }

    //direct user product detail page
    public function productDetailPage($id){
        $products=Product::get();
        $mainProduct=Product::where('id',$id)->first();
        $subProduct=SubProduct::where('product_id',$id)->get();

        return view('users.user.productDetail',compact('mainProduct','subProduct','products'));
    }

    //fliter product by category
    public function fliterByCategory($categoryId){
        $product=Product::where('category_id',$categoryId)->get();
        $category=Category::get();
        $cart=Cart::where('user_id',Auth::user()->id)->get();
        return view('users.user.shop',compact('product','category','cart'));
    }

    //product increase view count process
    public function viewCountIncrease(Request $request){
        $product=Product::where('id',$request->productId)->first();
            $viewCount=[
                'view_count'=>$product->view_count +1,
            ];
        Product::where('id',$request->productId)->update($viewCount);
    }

    //-----private function area
    //get product create data
    private function getProductData($request){
        return [
            'category_id'=>$request->categoryId,
            'collection'=>$request->collection,
            'name'=>$request->productName,
            'price'=>$request->price,
            'description'=>$request->description,
            'created_at'=>Carbon::now(),
        ];
    }

    //vali product create data
    private function valiProductData($request){
        $vali=[
            'categoryId'=>'required',
            'collection'=>'required',
            'productName'=>'required|min:3|unique:products,name,'.$request->productId,
            'price'=>'required',
            'description'=>'required',
            'productImage'=>'mimes:jpg,bmp,png',
        ];
        Validator::make($request->all(),$vali)->validate();
    }

    //get sub product data
    private function getSubProductData($request){
        return[
            'product_id'=>$request->productId,
        ];
    }

    //vali sub product data
    private function valiSubProductData($request){
        $vali=[
            'productId'=>'required',
            'productImage'=>'mimes:jpg,bmp,png',
        ];
        Validator::make($request->all(),$vali)->validate();


  }
}