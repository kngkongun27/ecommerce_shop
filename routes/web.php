<?php

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\ShopController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\BlogAdController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Front\AccountController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Front\HomeController as FrontHomeController;



// Route::get('/', function (\App\Repositories\Product\ProductRepositoryInterface $productRepository) {
//      return $productRepository->find(1);
// });

// Route::get('/', function(\App\Service\Product\ProductServiceInterface $productService) {
//           return $productService->all();
// });

Route::get('/', [FrontHomeController::class, 'index']);
Route::get('language/{lang}', [FrontHomeController::class, 'switchlang'])->name("language");


Route::prefix('/shop')->group(function() {
    Route::get('/product/{id}', [ShopController::class, 'show']);
    Route::post('/product/{id}', [ShopController::class, 'postComment']);
    Route::get('', [ShopController::class, 'index']);
    Route::get('category/{categoryName}', [ShopController::class, 'category']);
});
// Blog 


Route::prefix('cart')->group(function() {
        Route::get('add', [CartController::class, 'add' ]);
        Route::get('/', [CartController::class,  'index']);
        Route::get('delete', [CartController::class,  'delete']);
        Route::get('destroy', [CartController::class,  'destroy']);
        Route::get('update', [CartController::class,  'update']);
});


Route::prefix('checkout')->group(function(){
        Route::get('', [CheckoutController::class, 'index']);
        Route::post('/', [CheckoutController::class, 'addOrder']);
        Route::get('/result', [CheckoutController::class, 'result']);
});


//
Route::prefix('account')->group(function () {
    Route::get('login', [AccountController::class, 'login']);
    Route::post('login', [AccountController::class, 'checkLogin']);
    Route::get('logout', [AccountController::class, 'logout']);

    Route::get('register', [AccountController::class, 'register']);
    Route::post('register', [AccountController::class, 'postRegister']);


    Route::prefix('my-order')->middleware('CheckMemberLogin')->group(function() {
        Route::get('/', [AccountController::class, 'myOrderIndex']);
        Route::get('/{$id}', [AccountController::class, 'myOrderShow']);
    });
});
// UPGRADE

Route::get('/comment', [ShopController::class, 'getComment']);
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/getBlog', [BlogController::class, 'getBlog']);




// Dashboard ( Admin ) 

Route::prefix('admin')->middleware('CheckAdminLogin')->group(function () {
    
    Route::redirect('', 'admin/user');
    //Route::get('/', [HomeController::class, 'show']);
    Route::resource('user', UserController::class);

    Route::prefix('login')->group(function() {
       Route::get('', [HomeController::class, 'getLogin'])->withoutMiddleware('CheckAdminLogin');
        Route::post('', [HomeController::class, 'postLogin'])->withoutMiddleware('CheckAdminLogin');
    });

    Route::get('logout', [HomeController::class, 'logout']);

    
    

    // Blog
    Route::resource('blog', BlogAdController::class);
    Route::put('blog/{id}/edit', [BlogAdController::class, 'update']);
    Route::delete('/blog{id}', [BlogAdController::class, 'destroy']);

    // Category
    Route::resource('category', ProductCategoryController::class );
    Route::put('/category/{id}/edit', [ProductCategoryController::class, 'update']);
    Route::delete('/category/{id}', [ProductCategoryController::class, 'destroy']);


    // Brand
    Route::resource('brand', BrandController::class);
    Route::put('/brand/{id}/edit', [BrandController::class, 'update']);
    Route::delete('/brand/{id}', [BrandController::class, 'destroy']);

    // Product 
    Route::resource('product', ProductController::class);
    Route::put('/product{id}/edit', [ProductController::class, 'update']);
    Route::delete('/product/{id}', [ProductController::class, 'destroy']);


    // Product Image 04/16/2023
    Route::resource('product/{product_id}/image', ProductImageController::class);
    Route::put('product/{product_id}/image', [ProductImageController::class, 'store']);
    Route::delete('product/{product_id}/image', [ProductImageController::class, 'destroy']);

    // Product Detail
    Route::resource('product/{product_id}/detail', ProductDetailController::class);
    Route::put('product/{product_id}/detail/{product_detail_id}/edit', [ProductDetailController::class, 'update']);
    Route::delete('product/{product_id}/detail/{product_detail_id}', [ProductDetailController::class, 'destroy']);

    // Order 
    Route::resource('order', OrderController::class);
    // Update Quantity

    // 11/12/2023

  
    
     





});



