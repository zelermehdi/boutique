<?php
namespace App\Http\Controllers\Auth;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class, 'index'])->name('products.index');



Route::get('/boutique', [ProductController::class, 'index'])->middleware(['auth'])->name('products.index');

require __DIR__.'/auth.php';



//products routes
Route::get('/boutique', [ProductController::class, 'index'])->name('products.index');
Route::get('/boutique/{slug}', [ProductController::class,'show'])->name('products.show');
Route::get('/search', [ProductController::class,'search'])->name('products.search');

Route::group(['middleware'=>['auth']], function () {

    Route::get('/panier',[CartController::class,'index'])->name('cart.index');
Route::post('/panier/ajouter', [CartController::class,'store'])->name('cart.store');
Route::delete('/panier/{rowId}', [CartController::class,'destroy'])->name('cart.destroy');

});


//cart routes


Route::get('/videpanier', function(){
    Cart::destroy();
});


Route::group(['middleware'=>['auth']], function () {
Route::get('/paiement', [CheckoutController::class,'index'])->name('checkout.index');
Route::post('/paiement', [CheckoutController::class,'store'])->name('checkout.store');
Route::get('/merci', function() {
    return view('checkout.thankyou');
});
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



Route::get('/home', [HomeController::class,'index'])->name('home');

