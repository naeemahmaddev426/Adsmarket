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
use App\Http\Controllers\CategorysubController;
use App\Http\Controllers\SubCategorytypeContoller;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostCategory;
use App\Http\Controllers\BusinessadsController;
use Illuminate\Http\Request;



// Mail Route
Route::get('send-mail', [MailController::class, 'index']);
// home Route
Route::get('/', [AdshomeController::class, 'index'])->name('index');
//  search category Route
// Route::get('/search', [PostCategory::class, 'search'])->name('search');
// Search based on the general query
Route::get('/search', [PostCategory::class, 'search'])->name('top.search');

// Search based on a category
Route::get('/category/{category_name}', [PostCategory::class, 'category_search'])->name('category.search');

// Search based on a subcategory
Route::get('/category/{category_name}/subcategory/{sub_category_name}', [PostCategory::class, 'subcategory_search'])->name('sub_category.search');

// For filtering by subcategory and type
Route::get('/search-results', [PostCategory::class, 'subcategorynametype_search'])->name('sub_category_type.search');
Route::get('/search-filter', [PostCategory::class, 'filter'])->name('filterads');
Route::get('/recently-viewed', [PostAdController::class, 'getRecentlyViewedAds'])->name('recently.viewed');
Route::get('/check-ads', [PostCategory::class, 'checkAdsAvailability'])->name('check.ads');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


// Route for verifying the email
Route::get('/verify-email/{token}', [CustomRegisteredUserController::class, 'verifyEmail'])->name('verify.email');
Route::post('/resend-verification-email', [CustomRegisteredUserController::class, 'resendVerificationEmail'])->name('verification.resend');

// product Route
// Route::get('/search/{category_name}', [PostAdController::class, 'showByCategory'])->name('product.byCategory');
// Route::get('/category/{category_name}/subcategory/{sub_category_name}', [AdshomeController::class, 'showBySubcategory'])->name('product.subcategory');
// product Detail Route
Route::get('/product_detail/{id}', [PostAdController::class, 'showDetail'])->name('product.detail');

// Add this route for editing post attributes (the page where the user can edit an ad)
Route::get('/edit_post_attributes/{id}', [PostAdController::class, 'edit'])->name('edit_post_attributes');
Route::put('/edit_post_attributes/update/{id}', [PostAdController::class, 'update'])->name('edit_post_attributes.update'); // Keep this as PUT
Route::delete('/ads-images/{id}', [PostAdController::class, 'destroyImage']);
// Route for soft delete

// account register Route
Route::post('/register', [CustomRegisteredUserController::class, 'store'])->name('register');

// Logout route
Route::middleware('guest')->group(function () {
    Route::get('register', [CustomRegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [CustomRegisteredUserController::class, 'store']);
});
//user login Route
Route::get('/user/index', function () {
    if (Auth::check() && Auth::user()->role === 'user') {
        return app(AdsImageController::class)->index();
    } else {
        return redirect('/admin/index');
    }
})->name('user.index');
// all data store Route
Route::prefix('posts')->group(function () {
    Route::any('/post_ad', [post_adController::class, 'store'])->name('store');
    
});
Route::any('/post_ad', [post_adController::class, 'main'])->name('post_ad');
Route::post('/toggle-like/{adId}', [PostAdController::class, 'toggleLike'])->middleware('auth')->name('toggle.like');
//Route::post('/toggle-like/{ad}', [PostAdController::class, 'toggleLike'])->middleware('auth')->name('toggle_like');
Route::post('/save-phone-view', [PostAdController::class, 'savePhoneView'])->middleware('auth')->name('save_phone_view');
Route::post('/ad/view/store', [PostAdController::class, 'saveView'])->name('ad.view.store');


Route::post('/notifications/toggle-read-status/{id}', [NotificationController::class, 'toggleReadStatus'])->name('notifications.toggleReadStatus');
Route::post('/notifications/mark-read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.mark-read');



// contact Route
Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact');
Route::any('/contact/save', [ContactController::class, 'save'])->name('contact.save');

Route::any('/ads_for_bussiness', [BusinessadsController::class, 'index'])->name('ads.business');
Route::post('/store', [BusinessadsController::class, 'store'])->name('ads-business');
Route::get('/admin/user_data/{id}', [BusinessadsController::class, 'show'])->name('admin.user_data');
Route::get('/business-form-success', function ()
 { return view('business_form_success');
})->name('business_form_success');
// product detail Route id get

Route::get('/product_detail/{id}', [ContactController::class, 'create'])->name('product.detail');
Route::get('/product/{id}', [PostAdController::class, 'show'])->name('product.show');
Route::get('/product', [PostAdController::class, 'product'])->name('product');
Route::get('/search/category/{category_name}', [PostAdController::class, 'showByCategory'])->name('product.byCategory');


Route::middleware(['auth'])->get('/user/my_ads', [PostAdController::class, 'index']);
Route::get('user/users_profile', function () {
    return view('user.users_profile'); 
})->name('user.users_profile');

// Update user profile
Route::middleware(['auth'])->group(function () {
    Route::put('user/updateProfile', [AdsImageController::class, 'updateProfile'])->name('user.updateProfile');
    Route::put('/user/change-password', [AdsImageController::class, 'changePassword'])->name('user.changePassword');
    Route::delete('user/deleteProfileImage', [AdsImageController::class, 'deleteProfileImage'])->name('user.deleteProfileImage');

});
//  post_ad attribute Route
Route::get('/post_ad_attributes', [post_adController::class, 'index'])->name('post_ad_attributes');

// admin route
Route::get('/admin/index', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return app(AdminController::class)->index();
    } else {
        return redirect('/user/index');
    }
})->name('admin.index');




// admin all route of category
Route::get('/admin/admin_profile', [AdminController::class, 'profile'])->name('admin.admin_profile');
Route::put('/admin/admin_profile/{id}', [AdminController::class, 'updateUserProfile'])->name('admin.admin_profile');


Route::get('/admin/mobiles', [AdController::class, 'showCategory'])->name('admin.category.mobiles');
Route::get('/admin/vehicles', [AdController::class, 'showCategoryvahicle'])->name('admin.category.vehicles');
Route::get('/admin/property-sale', [AdController::class, 'propertysale'])->name('admin.category.property_sale');
Route::get('/admin/property-rent', [AdController::class, 'propertyrent'])->name('admin.category.property_rent');
Route::get('/admin/bikes', [AdController::class, 'bike'])->name('admin.category.bikes');
Route::get('/admin/furniture', [AdController::class, 'furniture'])->name('admin.category.furniture');
Route::get('/admin/fashion', [AdController::class, 'fashion'])->name('admin.category.fashion');
Route::get('/admin/contact_user_detail', [AdController::class, 'detail_contact'])->name('admin.detail_contact');
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

Route::get('/terms_service', [UserController::class, 'terms'])->name('term_services');
Route::get('/privacy-policy', [UserController::class, 'privacy'])->name('privacy');

// banner all route start

Route::prefix('admin')->name('admin.')->group(function () {
    
    // Route for Home Banner
    Route::get('/home-banner', [AdminController::class, 'homeBanner'])->name('home_banner');
    Route::post('/home-banner/upload', [AdminController::class, 'uploadHomeBanner'])->name('upload_home_banner');

    // Route for Product Banner
    Route::get('/product-banner', [AdminController::class, 'productBanner'])->name('product_banner');
    Route::post('/product-banner/upload', [AdminController::class, 'uploadProductBanner'])->name('upload_product_banner');

    // Route for Product Detail Banner
    Route::get('/product-detail-banner', [AdminController::class, 'productDetailBanner'])->name('product_detail_banner');
    Route::post('/product-detail-banner/upload', [AdminController::class, 'uploadProductDetailBanner'])->name('upload_product_detail_banner');

    // Route for Contact Banner
    Route::get('/contact-banner', [AdminController::class, 'contactBanner'])->name('contact_banner');
    Route::post('/contact-banner/upload', [AdminController::class, 'uploadContactBanner'])->name('upload_contact_banner');

});
// routes/web.php
Route::post('/send-verification-code', [ProfileController::class, 'sendVerificationCode'])->name('sendVerificationCode');
Route::post('/verify-code', [ProfileController::class, 'verifyPhoneCode'])->name('verifyCode');
Route::get('/now-page', [ProfileController::class, 'nowPage'])->name('nowPage');

// routes/web.php
Route::get('/login/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/login/google/callback', [GoogleController::class, 'handleGoogleCallback']);








// Route::put('test', [PostAdController::class, 'makeTest'])->name('test.images');