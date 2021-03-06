<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EstateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

//Web
Route::get('/', [WebController::class, 'index'])->name('web.index');
Route::get('/properties', [WebController::class, 'estates'])->name('web.estates');
//Route::get('/properties', [WebController::class, 'estatesNewToOld'])->name('web.estatesNewToOld');
Route::get('/property/{property}', [WebController::class, 'estate'])->name('web.estate');
Route::post('/contact/property/{estate}', [WebController::class, 'storeMessageEstate'])->name('web.storeMessageEstate');
Route::get('/blogs', [WebController::class, 'blogs'])->name('web.blogs');
Route::get('/blog', [WebController::class, 'blog'])->name('web.blog');
Route::get('/agents', [WebController::class, 'agents'])->name('web.agents');
Route::get('/agent/{agent}', [WebController::class, 'agent'])->name('web.agent');
Route::get('/contact', [WebController::class, 'contact'])->name('web.contact');
Route::post('/contact', [WebController::class, 'storeMessage'])->name('web.storeMessage');
Route::get('/search', [WebController::class, 'search'])->name('web.search');
Route::get('/about', [WebController::class, 'about'])->name('web.about');
Route::get('/login/web', [WebController::class, 'login'])->name('web.login');
Route::get('/register/web', [WebController::class, 'register'])->name('web.register');
Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/messages/{message}', [MessageController::class, 'update2'])->name('messages.update2');
    Route::resource('/messages', MessageController::class)->except(['show', 'update']);

    //Users
    Route::resource('user', UserController::class, ['except' => ['show']]);
    Route::get('user/users-pdf', [UserController::class, 'pdfUsers'])->name('user.pdfUsers');
    Route::get('user/user-pdf/{user}/', [UserController::class, 'pdfUser'])->name('user.pdfUser');

    //Customers
    Route::resource('customers', CustomerController::class, ['except' => ['show']]);
    Route::get('customers/customers-pdf', [CustomerController::class, 'pdfCustomers'])->name('customers.pdfCustomers');
    Route::get('customers/my-customers-pdf', [CustomerController::class, 'pdfMyCustomers'])->name('customers.pdfMyCustomers');
    Route::get('customers/customer-pdf/{customer}', [CustomerController::class, 'pdfCustomer'])->name('customers.pdfCustomer');
    Route::get('my-customers', [CustomerController::class, 'index2'])->name('customers.index2');

    //Owners
    Route::resource('owners', OwnerController::class, ['except' => ['show']]);
    Route::get('my-owners', [OwnerController::class, 'index2'])->name('owners.index2');
    Route::get('owners/owners-pdf', [OwnerController::class, 'pdfOwners'])->name('owners.pdfOwners');
    Route::get('owners/my-owners-pdf', [OwnerController::class, 'pdfMyOwners'])->name('owners.pdfMyOwners');
    Route::get('owners/owner-pdf/{owner}', [OwnerController::class, 'pdfOwner'])->name('owners.pdfOwner');

    //Orders
    Route::resource('orders', OrderController::class, ['except' => ['show']]);
    Route::get('my-customers-orders', [OrderController::class, 'index2'])->name('orders.index2');
    //Route::get('my-customers-orders/search/{order}', [OrderController::class, 'searchOrder'])->name('orders.searchOrder');
    Route::get('orders/create2/{customer}', [OrderController::class, 'create2'])->name('orders.create2');
    Route::get('orders/orders-pdf', [OrderController::class, 'pdfOrders'])->name('orders.pdfOrders');
    Route::get('orders/my-orders-pdf', [OrderController::class, 'pdfMyOrders'])->name('orders.pdfMyOrders');
    Route::get('orders/order-pdf/{order}', [OrderController::class, 'pdfOrder'])->name('orders.pdfOrder');

    //Estates
    Route::resource('estates', EstateController::class, ['except' => ['show']]);
    Route::get('estates/{estate}/images', [ImageController::class, 'index2'])->name('images.index2');
    Route::get('estates/{estate}/images/create', [ImageController::class, 'create2'])->name('images.create2');
    Route::post('estates/{estate}/images/', [ImageController::class, 'store2'])->name('images.store2');
    Route::delete('estates/{image}/images/{estate}/', [ImageController::class, 'destroy'])->name('images.destroy');
    Route::get('estates/{image}/images/{estate}/main', [ImageController::class, 'setMainImage'])->name('images.setMainImage');
    Route::get('my-owners-estates', [EstateController::class, 'index2'])->name('estates.index2');
    Route::put('estates/{estate}/publish/', [EstateController::class, 'publish'])->name('estates.publish');
    Route::get('estates/create2/{owner}', [EstateController::class, 'create2'])->name('estates.create2');
    Route::get('estates/estates-pdf', [EstateController::class, 'pdfEstates'])->name('estates.pdfEstates');
    Route::get('estates/my-estates-pdf', [EstateController::class, 'pdfMyEstates'])->name('estates.pdfMyEstates');
    Route::get('estates/estate-pdf/{estate}', [EstateController::class, 'pdfEstate'])->name('estates.pdfEstate');

    //Profile
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/profile-image', ['as' => 'profile.updateProfileImage', 'uses' => 'App\Http\Controllers\ProfileController@updateProfileImage']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    //System
    Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);

    //Language
    Route::get('/set_language/{lang}', [HomeController::class, 'set_language'])->name('set_language');
});
