<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryCantroller;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function (\Illuminate\Http\Request $request) {
    if ($request->route()->name('login') && !Auth::guest()) {
        return redirect('dashboard');
    }
    return view('admin/login');
})->name('login');

Route::post('/login', [AdminController::class, 'login'])->name('admin.login');

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'dashboard'], function(){
        Route::get('/', function () {
            return view('admin.dashboard');
        });
        Route::resource('categories', CategoryCantroller::class);
    });

});
