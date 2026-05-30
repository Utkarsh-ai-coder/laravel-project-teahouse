<?php

use App\Http\Controllers\AdminController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('website.pages.home');
})->name('home');

Route::get('/about', function () {
    return view('website.pages.about');
})->name('about');

Route::get('/products', function () {
    return view('website.pages.products');
})->name('products');

Route::get('/store', function () {
    return view('website.pages.store');
})->name('store');

Route::get('/features', function () {
    return view('website.pages.feature');
})->name('feature');

Route::get('/contact', function () {
    return view('website.pages.contact');
})->name('contact');

// Route::get('/admin-dash', function(){

//     return view('admin.pages.index');
// });

Route::group(
    ['middleware' => 'guest'],
    function () {


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'register_view'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');


}
);

Route::get('logout', [AuthController::class, 'logout'])->name('logout');



Route::group(
    ['middleware' => ['web', 'isAdmin']],
    function () {


Route::get('/admin-dashboard',[AdminController::class,'index'])->name('admin-dashboard');
Route::get('/create-user',[AdminController::class,'create'])->name('createUser');
Route::post('/store-user',[AdminController::class,'store'])->name('storeUser');
Route::get('/edit-user/{id}',[AdminController::class,'edit'])->name('edituser');
Route::post('/update-user/{id}',[AdminController::class,'update'])->name('updateUser');
Route::get('/delete-user/{id}',[AdminController::class,'delete'])->name('deleteuser');

}
);

Route::get('/404', [AuthController::class, 'error_page']);

Route::fallback(function(){

    return redirect('404');
});

