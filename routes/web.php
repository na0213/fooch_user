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
use App\Http\Controllers\TopController;
use App\Http\Controllers\ConversationController;
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
Route::get('/', [TopController::class, 'welcome'])->name('welcome');
Route::get('/top/index',  [TopController::class, 'index'])->name('top.index');
Route::get('/top/show/{item}', [TopController::class, 'show'])->name('top.show');
Route::get('/top/store/{store}', [TopController::class, 'store'])->name('top.store');
Route::get('/top/{store}/specific-business-transaction', [TopController::class, 'specificBusinessTransaction'])->name('top.specificBusinessTransaction');
Route::get('/top/whatis', [TopController::class, 'whatis'])->name('top.whatis');
Route::get('/top/owner_contact', [TopController::class, 'ownercontact'])->name('top.owner_contact');
Route::post('/top/owner_contact', [TopController::class, 'sendOwnerContact'])->name('top.send_owner_contact');
Route::get('/terms', [TopController::class, 'terms'])->name('terms');
Route::get('/legal', [TopController::class, 'legal'])->name('legal');
Route::get('/privacy', [TopController::class, 'privacy'])->name('privacy');
Route::get('/about', [TopController::class, 'about'])->name('about');
Route::get('/top/fooch_faq', [TopController::class, 'foochfaq'])->name('top.fooch_faq');
Route::get('/top/faq/faq100', [TopController::class, 'faq100'])->name('top.faq.faq100');
Route::get('/top/faq/faq101', [TopController::class, 'faq101'])->name('top.faq.faq101');
Route::get('/top/faq/faq102', [TopController::class, 'faq102'])->name('top.faq.faq102');
Route::get('/top/faq/faq103', [TopController::class, 'faq103'])->name('top.faq.faq103');
Route::get('/top/faq/faq104', [TopController::class, 'faq104'])->name('top.faq.faq104');
Route::get('/top/faq/faq105', [TopController::class, 'faq105'])->name('top.faq.faq105');
Route::get('/top/faq/faq106', [TopController::class, 'faq106'])->name('top.faq.faq106');
Route::get('/top/faq/faq107', [TopController::class, 'faq107'])->name('top.faq.faq107');

Route::get('/top/faq/faq200', [TopController::class, 'faq200'])->name('top.faq.faq200');
Route::get('/top/faq/faq201', [TopController::class, 'faq201'])->name('top.faq.faq201');
Route::get('/top/faq/faq202', [TopController::class, 'faq202'])->name('top.faq.faq202');
Route::get('/top/faq/faq203', [TopController::class, 'faq203'])->name('top.faq.faq203');
Route::get('/top/faq/faq204', [TopController::class, 'faq204'])->name('top.faq.faq204');
Route::get('/top/faq/faq205', [TopController::class, 'faq205'])->name('top.faq.faq205');
Route::get('/top/faq/faq206', [TopController::class, 'faq206'])->name('top.faq.faq206');
Route::get('/top/faq/faq207', [TopController::class, 'faq207'])->name('top.faq.faq207');
Route::get('/top/faq/faq208', [TopController::class, 'faq208'])->name('top.faq.faq208');
Route::get('/top/faq/faq209', [TopController::class, 'faq209'])->name('top.faq.faq209');
Route::get('/top/faq/faq210', [TopController::class, 'faq210'])->name('top.faq.faq210');
Route::get('/top/faq/faq211', [TopController::class, 'faq211'])->name('top.faq.faq211');
Route::get('/top/faq/faq212', [TopController::class, 'faq212'])->name('top.faq.faq212');
Route::get('/top/faq/faq213', [TopController::class, 'faq213'])->name('top.faq.faq213');
Route::get('/top/faq/faq214', [TopController::class, 'faq214'])->name('top.faq.faq214');
Route::get('/top/faq/faq215', [TopController::class, 'faq215'])->name('top.faq.faq215');
Route::get('/top/faq/faq216', [TopController::class, 'faq216'])->name('top.faq.faq216');
Route::get('/top/faq/faq217', [TopController::class, 'faq217'])->name('top.faq.faq217');
Route::get('/top/faq/faq218', [TopController::class, 'faq218'])->name('top.faq.faq218');
Route::get('/top/faq/faq219', [TopController::class, 'faq219'])->name('top.faq.faq219');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/home/whatis', [HomeController::class, 'whatis'])->name('home.whatis');
    Route::get('/home/terms', [HomeController::class, 'terms'])->name('home.terms');
    Route::get('/home/legal', [HomeController::class, 'legal'])->name('home.legal');
    Route::get('/home/privacy', [HomeController::class, 'privacy'])->name('home.privacy');
    Route::get('/home/about', [HomeController::class, 'about'])->name('home.about');
    Route::get('/home/fooch_faq', [HomeController::class, 'foochfaq'])->name('home.fooch_faq');
    Route::get('/home/faq/faq100', [HomeController::class, 'faq100'])->name('home.faq.faq100');
    Route::get('/home/faq/faq101', [HomeController::class, 'faq101'])->name('home.faq.faq101');
    Route::get('/home/faq/faq102', [HomeController::class, 'faq102'])->name('home.faq.faq102');
    Route::get('/home/faq/faq103', [HomeController::class, 'faq103'])->name('home.faq.faq103');
    Route::get('/home/faq/faq104', [HomeController::class, 'faq104'])->name('home.faq.faq104');
    Route::get('/home/faq/faq105', [HomeController::class, 'faq105'])->name('home.faq.faq105');
    Route::get('/home/faq/faq106', [HomeController::class, 'faq106'])->name('home.faq.faq106');
    Route::get('/home/faq/faq107', [HomeController::class, 'faq107'])->name('home.faq.faq107');

    //商品
    Route::get('/index',  [ItemController::class, 'index'])->name('items.index');
    Route::get('show/{item}', [ItemController::class, 'show'])->name('items.show');
    Route::post('/products/{product}/favorite', [ItemController::class, 'favorite']);
    Route::get('/favorites',  [ItemController::class, 'favorites'])->name('items.favorites');
    Route::get('/category/{category}', [ItemController::class, 'category'])->name('items.category');

    //店舗
    Route::get('/stores/{store}', [StoreController::class, 'show'])->name('store.show');
    Route::get('/stores/{store}/specific-business-transaction', [StoreController::class, 'specificBusinessTransaction'])->name('store.specificBusinessTransaction');

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

    Route::get('/order/{order}/conversation', [ConversationController::class, 'show'])->name('order.conversation');
    Route::post('/order/{order}/conversation', [ConversationController::class, 'send'])->name('conversation.send');

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

    Route::get('/user/confirmDelete/{id}', [UserController::class, 'confirmDelete'])->name('user.confirm.delete');
    Route::delete('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    
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
