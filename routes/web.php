<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    //商品
    Route::get('/index',  [ItemController::class, 'index'])->name('items.index');
    Route::get('show/{item}', [ItemController::class, 'show'])->name('items.show');

    //店舗
    Route::get('/stores/{store}', [StoreController::class, 'show'])->name('store.show');

    //カート
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/show', [CartController::class, 'show'])->name('cart.show');
    Route::get('/cart/shipping_address_create', [CartController::class, 'createShippingAddress'])->name('cart.shipping_address.create');
    Route::post('/cart/shipping_address', [CartController::class, 'storeShippingAddress'])->name('cart.shipping_address.store');
    Route::delete('/cart/shipping_address/{id}', [CartController::class, 'destroyShippingAddress'])->name('cart.shipping_address.destroy');
    Route::get('/get-shipping-fee/{prefecture}', [CartController::class, 'getShippingFee'])->name('getShippingFee');

    //注文情報
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/{order}', [OrderController::class, 'show'])->name('order.show');
    Route::patch('/order/{order}/update-status', [OrderController::class, 'updateStatus'])->name('order.updateStatus');

    //ユーザー
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    // Edit name
    Route::get('/user/{user}/edit-name', [UserController::class, 'editName'])->name('user.edit.name');
    // Edit address
    Route::get('/user/{user}/edit-address', [UserController::class, 'editAddress'])->name('user.edit.address');
    // Edit tel
    Route::get('/user/{user}/edit-tel', [UserController::class, 'editTel'])->name('user.edit.tel');
    // Edit mail
    Route::get('/user/{user}/edit-mail', [UserController::class, 'editMail'])->name('user.edit.mail');
    // Edit birth
    Route::get('/user/{user}/edit-birth', [UserController::class, 'editBirth'])->name('user.edit.birth');

    // Update name
    Route::put('/user/{user}/update-name', [UserController::class, 'updateName'])->name('user.update.name');
    // Update address
    Route::put('/user/{user}/update-address', [UserController::class, 'updateAddress'])->name('user.update.address');
    // Update tel
    Route::put('/user/{user}/update-tel', [UserController::class, 'updateTel'])->name('user.update.tel');
    // Update mail
    Route::put('/user/{user}/update-mail', [UserController::class, 'updateMail'])->name('user.update.mail');
    // Update birth
    Route::put('/user/{user}/update-birth', [UserController::class, 'updateBirth'])->name('user.update.birth');

    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //お問合せ
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
    Route::post('/contact/thanks', [ContactController::class, 'send'])->name('contact.send');
});

//カートと支払い
Route::prefix('cart')->middleware('auth')->group(function(){
    Route::post('add', [CartController::class, 'add'])->name('cart.add');
    Route::post('delete/{item}', [CartController::class, 'delete'])->name('cart.delete');
    Route::post('purchase', [CartController::class, 'purchase'])->name('cart.purchase'); // 追加
    Route::post('registerOrUpdateCard', [CartController::class, 'registerOrUpdateCard'])->name('cart.registerOrUpdateCard'); // 追加
    // Route::get('checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    Route::get('success', [CartController::class, 'success'])->name('cart.success');
    Route::get('cancel', [CartController::class, 'cancel'])->name('cart.cancel');
});

require __DIR__.'/auth.php';
