<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SousFamilleController;
use App\Http\Controllers\UserController;
use App\Models\SousFamille;
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



//home
Route::get('/', [HomeController::class, 'index']);

//Products
Route::get('/Products',[ProduitController::class,'sort'])->name('product_lis');
Route::get('/Products/{id}',[ProduitController::class,'product'])->name('productdetail');

//product review
Route::post('/Review/store',[ReviewController::class,'store'])->name('review.store');
Route::delete('/Review/destroy/{id}',[ReviewController::class,'destroy'])->name('review.destroy');


//categorie page 
Route::get('/categoris/{id}',[FamilleController::class,'familleDetail'])->name('familleDetail');
Route::get('/sub-categories/{id}',[SousFamilleController::class,'sous_familleDetail'])->name('sousfamilleDetail');

#admin route
Route::middleware('auth','isAdmin:1')->group(function () {

    //dachboard of admin
    Route::get('/admin/dachboard', function () {
    $table = 'dachboard';
    return view('Backend.dachboard', compact('table'));})->name('admin.dachboard');
    Route::resource('familles', FamilleController::class);
    Route::resource('sous-famille', SousFamilleController::class);
    Route::resource('Produits', ProduitController::class);
    Route::resource('marques', MarqueController::class);

    //profile of admin
    Route::get('/admin/Profile/{id}', [UserController::class, 'show'])->name('profile.show');
    Route::put('/admin/Profile/update/{id}', [UserController::class, 'update'])->name('profile.update');
    Route::delete('/admin/Profile/destroy/{id}', [UserController::class, 'destroy'])->name('profile.destroy');
    Route::put('/admin/profile/change-password/{id}', [UserController::class, 'changePassword'])->name('profile.changePassword');

  //Messages route
  Route::resource('/admin/Messages', MessageController::class);


});

#commercial route
Route::middleware('auth','isAdmin:2')->group(function () {
    Route::get('/commercial/dachboard', function () {
    $table = 'dachboard';
    return view('commercial.dachboard', compact('table'));})->name('commercial.dachboard');

    // Route::resource('familles', FamilleController::class);
    // Route::get('/commercial/familles', [FamilleController::class, 'index'])->name('commercial.familles');
    // Route::get('/commercial/familles/create', [FamilleController::class, 'create'])->name('commercial.create');
    // Route::post('/commercial/familles/post', [FamilleController::class, 'post'])->name('commercial.post');
    // Route::get('/commercial/familles/edit/{id}', [FamilleController::class, 'edit'])->name('commercial.edit');
    // Route::put('/commercial/familles/update/{id}', [FamilleController::class, 'update'])->name('commercial.update');
    // Route::delete('/commercial/familles/delete/{id}', [FamilleController::class, 'delete'])->name('commercial.delete');


    // Route::resource('sous-famille', SousFamilleController::class);

    // Route::resource('Produits', ProduitController::class);
    // Route::resource('marques', MarqueController::class);

    Route::get('/commercial/logout', [LoginController::class, 'logout'])->name('commercial.logout');

});

#user route
Route::middleware('auth','isAdmin:0')->group(function () { 
    Route::get('/user/logout', [LoginController::class, 'logout'])->name('user.logout');
    Route::get('/user/dachboard', function () {
        $table = 'dachboard';
        return view('user.dachboard', compact('table'));})->name('user.dachboard');    

        
    Route::get('/user/Profile/{id}', [UserController::class, 'ProfileUser'])->name('profileUser.show');
    Route::put('/user/Profile/update/{id}', [UserController::class, 'update'])->name('profile.update');
    Route::delete('/user/Profile/destroy/{id}', [UserController::class, 'destroy'])->name('profile.destroy');
    Route::put('/user/profile/change-password/{id}', [UserController::class, 'changePassword'])->name('profile.changePassword');

});


//message route 
Route::post('/contact', [MessageController::class,'store'])->name('contact.store');
Route::get('/contact-us',function(){
    return view('Frontend.pages.contact');
    })->name('contact-us');

#route login and registre
Route::get('/Registre', [UserController::class, 'create']);
Route::post('/Registre/store', [UserController::class, 'store'])->name('login.registre');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');


Route::get('/about-us',function(){
return view('Frontend.pages.about');
});


Route::middleware('guest')->group(function () {


    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});


