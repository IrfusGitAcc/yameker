<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShipmentController;

Route::get('/auth/google', [SocialiteController::class, 'googleSignIn'])->name('google.login');
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);


Route::get('/admin-login', [LoginController::class, 'loginForm'])->name('admin.login.form');
Route::post('/admin-login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/admin-logout', [LoginController::class, 'logout'])->name('admin.logout');

/*app user*/
Route::post('/register', [LoginController::class, 'appUserStore'])->name('register');
Route::post('/login', [LoginController::class, 'appUserLogin'])->name('login');
Route::get('/login', [LoginController::class, 'appUserLogin'])->name('getlogin');
// In your routes/web.php file
Route::post('/forgot-password', [LoginController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [LoginController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [LoginController::class, 'resetPassword'])->name('password.update');

Route::post('/appuser-logout', [LoginController::class, 'appUserLogout'])->name('logout');
Route::get('/appuser-logout', [LoginController::class, 'appUserLogout'])->name('logout');

/*guest */

Route::get('/guest-login',[LoginController::class, 'guestLogin'])->name('guest.login');
Route::get('/guest-register',[LoginController::class, 'guestRegister'])->name('guest.register');

Route::middleware('admin.control')->group(function () {
    Route::get('/admin',[AdminController::class,'dashboard'])->name('index');
    Route::get('/catogories',[AdminController::class,'categoryList'])->name('categories');
    Route::get('/add-category-page',[AdminController::class,'categoryPage'])->name('category.page');
    Route::post('/add-category',[AdminController::class,'addCategory'])->name('add.category');
    Route::get('/edit-category/{catId}',[AdminController::class,'editCategory'])->name('edit.category');
    Route::post('/update-category/{catId}', [AdminController::class, 'updateCategory'])->name('update.category');
    Route::delete('/delete-category/{catId}', [AdminController::class, 'deleteCategory'])->name('delete.category');
    Route::get('/restore-category/{catId}', [AdminController::class, 'restoreCategory'])->name('restore.category');
    
    
    Route::get('/sub-categories', [AdminController::class, 'subCategoryList'])->name('sub.category');
    Route::post('/add-subcategory', [AdminController::class, 'addSubCategory'])->name('add.subcategory');
    Route::get('/edit-subcategory/{subcatId}', [AdminController::class, 'editSubCategory'])->name('edit.subcat');
    Route::post('/update-subcategory/{subcatId}',[AdminController::class, 'updateSubCategory'])->name('update.subcat');
    Route::delete('/delete-subcategory/{subcatId}', [AdminController::class, 'deleteSubCategory'])->name('delete.subcat');
    Route::get('/restore-subcategory/{subcatId}', [AdminController::class, 'restoreSubCategory'])->name('restore.subcat');
    
    Route::get('/users', [AdminController::class, 'adminList'])->name('users');
    Route::post('/add-admin', [AdminController::class, 'addAdmin'])->name('add.admin');
    Route::post('/update-admin',[ AdminController::class, 'updateAdmin'])->name('update.admin');
    Route::delete('/delete-admin/{userId}', [ AdminController::class, 'deleteAdmin'])->name('delete.admin');
    
    Route::get('/customers-list', [AdminController::class, 'customers'])->name('customers.list');
    Route::get('/customer-live-search',[AdminController::class, 'liveSearchCustomerAddress'])->name('customer.live.search');
    /*app users */
    Route::get('/app-users',[AdminController::class, 'appUsers'])->name('app.users');
    Route::get('/admin-live-search', [AdminController::class, 'liveSearchAppUsers'])->name('admin.live.search');

    Route::get('/sales-report',[AdminController::class, 'salesReport'])->name('sales.report');
    Route::get('/sales-report-download-excel', [AdminController::class, 'downloadSalesReportExcel'])->name('sales-report.excel');
    
    
    Route::get('/products', [ProductController::class, 'productList'])->name('products');
    Route::get('/product-form', [ProductController::class, 'productForm'])->name('product.form');
    Route::post('/add-product', [ProductController::class, 'storeProduct'])->name('add.product');
    Route::get('/edit-product/{productId}', [ProductController::class, 'editProduct'])->name('edit.product');
    Route::post('/update-product/{productId}', [ProductController::class, 'updateProduct'])->name('update.product');
    Route::delete('/delete-product/{productId}',[ProductController::class, 'deleteProduct'])->name('delete.product');
    Route::get('/products-live-search',[ProductController::class, 'liveSearchProducts'])->name('products.live.search');
   
    /*cart admin*/
    Route::get('/admin-cart', [CartController::class, 'adminCartList'])->name('admin.cart');
    Route::get('/cart-live-search',[CartController::class, 'liveSearchCart'])->name('cart.live.search');
    /*shipments*/
    Route::get('/shipments',[ShipmentController::class,'viewShipments'])->name('shipments');
    Route::post('/create-shipment',[ShipmentController::class, 'createShipment'])->name('create.shipment');
    /*order */
    Route::get('/admin-order-list',[OrderController::class, 'adminOrderList'])->name('admin.orders');
    Route::get('/order-live-search',[OrderController::class, 'liveSearchOrder'])->name('order.live.search');
    Route::post('/admin/orders/{orderId}/cancel', [OrderController::class, 'cancel'])->name('admin.orders.cancel');


});

Route::get('/shop',[ProductController::class, 'shop'])->name('shop');

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/show-by-category/{catId}', [HomeController::class, 'showByCategory'])->name('showby.category');
Route::get('/product-details/{producId}',[HomeController::class, 'productDetails'])->name('product.details');
Route::get('/terms&conditions',[HomeController::class, 'termsAndCondition'])->name('terms.condition');
Route::get('/privacy-policy',[HomeController::class,'privacyPolicy'])->name('privacy.policy');
Route::get('/checkout',[HomeController::class,'checkout'])->name('checkout');
Route::get('/about-us', [HomeController::class,'aboutYameker'])->name('about.us');
Route::get('/contact-us', [HomeController::class,'contactYameker'])->name('contact.us');
Route::get('/search', [HomeController::class,'searchResult'])->name('search');
/*app user account*/
Route::get('/user-account', [HomeController::class,'myAccount'])->name('account');
Route::get('/user-orders',[HomeController::class, 'myOrder'])->name('order');

Route::get('/view-cart', [CartController::class, 'viewCart'])->name('view.cart');
Route::post('/cart-store', [CartController::class, 'store'])->name('cart.store');
Route::delete('/cart-remove/{cartId}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/cart-remove-modal/{cartId}', [CartController::class, 'destroy']);

/* view cart page quantity and cart price updation*/
/* cart modal right side product detail page quantity and price updation*/
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');

Route::get('/wishlist',[CartController::class, 'wishlist'])->name('wishlist');
Route::post('/wishlist-store', [CartController::class, 'wishlistStore'])->name('wishlist.store');
Route::post('/wishlist-remove', [CartController::class, 'wishlistRemove'])->name('wishlist.remove');





Route::get('/get-states/{countryId}',[OrderController::class, 'stateFromCountry'])->name('state.country');
Route::post('/save-address', [OrderController::class, 'saveAddress'])->name('save.address');
Route::post('/update-address', [OrderController::class, 'updateAddress'])->name('update.address');

Route::get('/confirm-payment',[OrderController::class, 'confirmPayment'])->name('confirm.payment');



/*payments*/

Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('telr.pay');
Route::post('/place-order', [PaymentController::class, 'placeOrder'])->name('place.order');
Route::get('/handle-payment/success', [PaymentController::class, 'paymentSuccess']);
Route::get('/handle-payment/cancel', [PaymentController::class, 'paymentCancel']);
Route::get('/handle-payment/declined', [PaymentController::class, 'paymentDeclined']);



