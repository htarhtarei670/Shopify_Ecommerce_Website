<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Ajax\AdminController;


Route::middleware(['admin_auth'])->group(function () {
    Route::redirect('/', 'login/page');
    Route::get('login/page',[AuthController::class,'loginPage'])->name('login#page');
    Route::get('register/page',[AuthController::class,'registerPage'])->name('register#page');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');

    Route::middleware(['admin_auth'])->group(function () {
        Route::prefix('admin')->group(function(){

            Route::prefix('category')->group(function(){
                Route::get('list',[CategoryController::class,'categoryList'])->name('admin#category');
                Route::get('create/page',[CategoryController::class,'categoryCreatePage'])->name('admin#categoryCreate');
                Route::post('create/process',[CategoryController::class,'categoryCreateProcess'])->name('admin#categoryCreateProcess');
                Route::get('edit/page/{id}',[CategoryController::class,'categoryEditPage'])->name('admin#categoryEditPage');
                Route::post('edit/process/{id}',[CategoryController::class,'categoryEditProcess'])->name('admin#categoryEditProcess');
                Route::get('delete/{id}',[CategoryController::class,'categoryDelete'])->name('admin#categoryDelete');
            });

            Route::prefix('product')->group(function(){
                Route::get('list/page',[ProductController::class, 'productListPage'])->name('admin#productList');
                Route::get('create/page',[ProductController::class,'productCreatePage'])->name('admin#productCreatepage');
                Route::post('create/process',[ProductController::class,'productCreateProcess'])->name('admin#productCreateProcess');
                Route::get('edit/page/{id}',[ProductController::class,'productEditPage'])->name('admin#editPage');
                Route::get('update/page/{id}',[ProductController::class,'productupdatePage'])->name('admin#updatePage');
                Route::post('update/process',[ProductController::class,'productUpdateProcess'])->name('admin#updateProcess');
                Route::get('delete/{id}',[ProductController::class,'productDelete'])->name('admin#productDelete');


                Route::get('separate/change',[AdminController::class,'productSeperateChange'])->name('admin#seperateChange');
                Route::get('trendStatus/change',[AdminController::class,'productTrendStatusChange'])->name('admin#trendStatusChange');
            });

            Route::prefix('product/sub')->group(function(){
                Route::get('create/page',[ProductController::class,'productSubCreatePage'])->name('admin#productSubCreatePage');
                Route::post('create/process',[ProductController::class,'productSubCreateProcess'])->name('admin#productSubCreateProcess');
                Route::get('list',[ProductController::class,'productSubListPage'])->name('admin#productSubListPage');
                Route::get('update/page/{id}',[ProductController::class,'productSubUpdatePage'])->name('admin#productSubUpdatePage');
                Route::post('update/process',[ProductController::class,'productSubUpdateProcess'])->name('admin#productSubUpdateProcess');
                Route::get('product/delete/{id}',[ProductController::class,'productSubDelete'])->name('admin#productSubDelete');

            });

            Route::prefix('account')->group(function(){
                Route::get('detail/page/{id}',[AdminController::class,'accountDetailPage'])->name('admin#accountDetailPage');
                Route::get('update/page/{id}',[AdminController::class,'accountUpdatePage'])->name('admin#accountUpdatePage');
                Route::post('update/process',[AdminController::class,'accountUpdateProcess'])->name('admin#accountUpdateProcess');

                Route::get('adminList/page',[AdminController::class,'adminListPage'])->name('admin#listPage');
                Route::get('adminList/role/change',[AdminController::class,'adminListRoleChange'])->name('admin#roleChange');

                Route::get('password/change/page',[AdminController::class,'adminPasswordChangePage'])->name('admin#passwordChangePage');
                Route::post('password/change/process',[AdminController::class,'adminPasswordChangProcess'])->name('admin#passwordChangeProcess');
            });

            Route::prefix('user/list')->group(function(){
                Route::get('page',[AdminController::class,'userListPage'])->name('admin#userListPage');
                Route::get('detail/page/{id}',[AdminController::class,'useListDetailPage'])->name('admin#userListDetailPage');
                Route::get('role/change',[AdminController::class,'userListRoleChange'])->name('admin#userListRoleChange');

            });

            Route::prefix('order')->group(function(){
                Route::get('list/page',[OrderController::class,'adminOrderListPage'])->name('admin#orderListPage');
                Route::get('status/change',[OrderController::class,'orderStatusChange'])->name('admin#orderStatusChange');
                Route::get('status/sorting',[OrderController::class,'orderStatusSorting'])->name('admin#orderStatusSorting');
            });

            Route::prefix('contact')->group(function(){
               Route::get('list/page',[ContactController::class,'contactListPage'])->name('admin#contactListPage');
               Route::get('comment/delete/{id}',[ContactController::class,'commentDelete'])->name('admin#commentDelete');
               Route::get('detail/page/{id}',[ContactController::class,'detailPage'])->name('admin#commentDetailPage');
            });

        });
    });
});

Route::middleware(['user_auth'])->group(function () {
    Route::prefix('user')->group(function(){
        Route::get('home/page',[AuthController::class,'homePage'])->name('user#homePage');
        Route::get('contactus/page',[AuthController::class,'contactUsPage'])->name('user#contactUsPage');
        Route::post('contact/store',[UserController::class,'contactDataStore'])->name('user#contactDataStore');

        Route::get('shop/page',[ProductController::class,'shopPage'])->name('user#shopPage');
        Route::get('product/detail/page/{id}',[ProductController::class,'productDetailPage'])->name('user#productDetailPage');
        Route::get('product/view/count/increase',[ProductController::class,'viewCountIncrease'])->name('user#productViewCountUncrease');

        Route::get('blog/page',[AuthController::class,'blogPage'])->name('user#blogPage');

        //fliter product by category
        Route::get('fliter/{categoryId}',[ProductController::class,'fliterByCategory'])->name('user#fliterByCategory');

        // account
        Route::get('accout,{id}',[UserController::class,'userAccountPage'])->name('user#accountpage');
        Route::get('account/updatePage/{id}',[UserController::class,'userAccountUpdatePage'])->name('user#accountUpdatePage');
        Route::post('account/update/process',[UserController::class,'userAccountUpdateProcess'])->name('user#accountUpdateProcess');
        Route::get('account/password/change/page',[UserController::class,'userPasswordChangePage'])->name('user#passwordChange');
        Route::post('account/password/change/process',[UserController::class,'userPasswordChangeProcess'])->name('user#passwordChangeProcess');

         //order
        Route::prefix('order')->group(function(){
            Route::get('page',[OrderController::class,'orderPage'])->name('user#orderPage');

            Route::get('add/cart',[AjaxController::class,'addCart'])->name('user#addCart');
            Route::get('remove/acart/{id}',[OrderController::class,'removeAcart'])->name('user#removeAcart');
            Route::get('remove/allcart',[OrderController::class,'removeAllCart'])->name('user#removeAllCart');
            Route::get('add/all/cart',[OrderController::class,'addAllCart'])->name('user#addAllCart');

            //add product data to cart table with cart btn
            Route::get('add/cart/witn/cart/btn',[OrderController::class,'addCartBtn'])->name('user#addCartWithCartBtn');

            Route::get('list/page',[OrderController::class,'orderListPage'])->name('user#orderListPage');
        });
    });
});