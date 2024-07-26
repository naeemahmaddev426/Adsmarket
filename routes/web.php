<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\post_adController;
use App\Http\Controllers\Auth\CustomRegisteredUserController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\PostAdController;
use App\Http\Controllers\AdsImageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\adshomecontroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostCategory;
use App\Http\Controllers\CategorysubController;
use App\Http\Controllers\SubCategorytypeContoller;
use App\Http\Controllers\MailController;




Route::get('send-mail', [MailController::class, 'index']);
Route::get('/', [AdshomeController::class, 'index'])->name('index');
Route::get('/product/{category_name}', [PostAdController::class, 'showByCategory'])->name('product.byCategory');
Route::get('/category/{category_name}/subcategory/{sub_category_name}', [AdshomeController::class, 'showBySubcategory'])->name('product.subcategory');
Route::get('/product_detail/{id}', [PostAdController::class, 'showDetail'])->name('product.detail');

Route::post('/register', [CustomRegisteredUserController::class, 'store'])->name('register');

// Logout route
Route::middleware('guest')->group(function () {
    Route::get('register', [CustomRegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [CustomRegisteredUserController::class, 'store']);
});

Route::get('/user/index', function () {
    $user = Auth::user();

    // Check if user role is 'user'
    if ($user && $user->role === 'user') {
        return app()->call([AdsImageController::class, 'index']);
    }

    // Redirect to the admin index if role is not 'user'
    return redirect()->route('admin.index');
})->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->name('user.index');


Route::prefix('posts')->group(function () {
    Route::any('/post_ad', [post_adController::class, 'store'])->name('store');
    
});
Route::any('/post_ad', [PostCategory::class, 'index'])->name('post_ad');

Route::get('/check_auth', function() {
    return response()->json(['authenticated' => Auth::check()]);
});


Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact');
Route::any('/contact/save', [ContactController::class, 'save'])->name('contact.save');



Route::get('/product_detail/{id}', [ContactController::class, 'create'])->name('product.detail');
Route::get('/product/{id}', [PostAdController::class, 'show'])->name('product.show');
Route::get('/product', [PostAdController::class, 'product'])->name('product');
Route::get('/product/category/{category_name}', [PostAdController::class, 'showByCategory'])->name('product.byCategory');


Route::middleware(['auth'])->get('/user/my_ads', [PostAdController::class, 'index']);
Route::get('user/users_profile', function () {
    return view('user.users_profile'); 
})->name('user.users_profile');

Route::get('/post_ad_attributes', [post_adController::class, 'index'])->name('post_ad_attributes');

// admin route
Route::get('/admin/index', function () {
    $user = Auth::user();

    // Check if user role is 'admin'
    if ($user && $user->role === 'admin') {
        return app()->call('App\Http\Controllers\AdminController');
    }

    // Redirect to the user index if role is not 'admin'
    return redirect()->route('user.index');
})->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->name('admin.index');
Route::get('/admin/admin_profile', [AdminController::class, 'profile'])->name('admin.admin_profile');
Route::get('/admin/mobiles', [AdController::class, 'showCategory'])->name('admin.category.mobiles');
Route::get('/admin/vehicles', [AdController::class, 'showCategoryvahicle'])->name('admin.category.vehicles');
Route::get('/admin/property-sale', [AdController::class, 'propertysale'])->name('admin.category.property_sale');
Route::get('/admin/property-rent', [AdController::class, 'propertyrent'])->name('admin.category.property_rent');
Route::get('/admin/bikes', [AdController::class, 'bike'])->name('admin.category.bikes');
Route::get('/admin/furniture', [AdController::class, 'furniture'])->name('admin.category.furniture');
Route::get('/admin/fashion', [AdController::class, 'fashion'])->name('admin.category.fashion');
Route::get('/admin/user_ads/{userId}', [ContactController::class, 'adsall'])->name('admin.user_ads');
Route::post('/admin/updateAdStatus', [ContactController::class, 'updateAdStatus'])->name('admin.updateAdStatus');

// Route to handle status update


// category route
Route::any('/admin/adscategory', [CategoryController::class, 'index'])->name('admin.adscategory');
Route::any('/admin/adscategory/store', [CategoryController::class, 'store'])->name('admin.adscategory.store');
Route::delete('/admin/adscategory/{id}', [CategoryController::class, 'destroy'])->name('admin.adscategory.destroy');
Route::any('/admin/adscategory/{id}/edit', [CategoryController::class, 'edit'])->name('admin.adscategory.edit');
Route::any('/admin/adscategory/{id}/update', [CategoryController::class, 'update'])->name('admin.adscategory.update');
// sub category Route
Route::get('/admin/adssubcategory', [CategorysubController::class, 'index'])->name('admin.adssubcategory');
Route::post('/admin/adssubcategory/store', [CategorysubController::class, 'store'])->name('admin.adssubcategory.store');
Route::get('/admin/adssubcategory/edit/{id}', [CategorysubController::class, 'edit'])->name('admin.adssubcategory.edit');
Route::post('/admin/adssubcategory/update/{id}', [CategorysubController::class, 'update'])->name('admin.adssubcategory.update');
Route::delete('/admin/adssubcategory/delete/{id}', [CategorysubController::class, 'destroy'])->name('admin.adssubcategory.delete');
// sub category name type
Route::get('/admin/adsubscategorytype', [SubCategorytypeContoller::class, 'index'])->name('admin.adsubscategorytype');
Route::post('/admin/adsubscategorytype/store', [SubCategorytypeContoller::class, 'store'])->name('admin.adsubscategorytype.store');
Route::get('/admin/adsubscategorytype/edit/{id}', [SubCategorytypeContoller::class, 'edit'])->name('admin.editadsubscategorytype');
Route::any('/admin/adsubscategorytype/update/{id}', [SubCategorytypeContoller::class, 'update'])->name('admin.adsubscategorytype.update');
Route::delete('/admin/adsubscategorytype/delete{id}', [SubCategorytypeContoller::class, 'destroy'])->name('admin.adsubscategorytype.delete');

