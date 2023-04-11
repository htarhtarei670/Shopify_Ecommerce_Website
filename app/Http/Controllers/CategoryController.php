<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //direct admin's category page
    public function categoryList(){
        $category=Category::when(request('searchKey'),function($p){
            $key=request('searchKey');
            $p->where('name','like','%'.$key.'%');
        })->get();
        return view('admin.category.home',compact('category'));
    }

    // direct admin's category add page
    public function categoryCreatePage(){
        return view('admin.category.create');
    }

    // category create process
    public function categoryCreateProcess(Request $request){
        $validCate=$this->validCategoryDate($request);
        $category=$this->getCategoryData($request);
        Category::create($category);
        return redirect()->route('admin#category')->with(['createSuccess'=>'Category created successfully']);
    }

    // direct category edit page
    public function categoryEditPage($id){
        $edit=Category::where('id',$id)->first();
        return view('admin.category.edit',compact('edit'));
    }

    //category edit process
    public function categoryEditProcess($id,Request $request){
        $validCate=$this->validCategoryDate($request);
        $updateCategory=$this->getCategoryData($request);
        Category::where('id',$id)->update($updateCategory);
        return redirect()->route('admin#category')->with(['updateSuccess'=>'Category name updated successfully']);
    }

    //delete category
    public function categoryDelete($id){ 
        $delete=Category::where('id',$id)->first()->delete();
        return back()->with(['deleteSuccess'=>'Category Deleted Successfully']);
    }

    // ----private area
    //get category create data
    private function getCategoryData($request){
        return[
            'name'=>$request->categoryName,
        ];
    }

    //validate category data
    private function validCategoryDate($request){
         Validator::make($request->all(),[
            'categoryName'=>'required|unique:categories,name,'.$request->id,
        ])->validate();
    }
}