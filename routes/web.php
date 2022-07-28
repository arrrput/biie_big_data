<?php

use App\Http\Controllers\BangunanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EstateRequestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\EstateDownload;
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
    return view('auth.login' );
});

Route::get('/admin', function(){
    return view('layouts.backend');
});

Route::get('/etis', function () {
    return view('layouts.frontend');
});

Route::get('/dashboard', function () {
    return view('dashboard',[DashboardController::class,'index']);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');

    Route::get('home',[HomeController::class, 'index'])->name('home');
    Route::resource('users', UserController::class);

    //Role
    Route::resource('role', RoleController::class);
    Route::get('role',[RoleController::class,'index'])->name('roles.index');
    Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
    
    //estate
    Route::resource('estate', BangunanController::class);
    Route::post('estate/store', [BangunanController::class,'store'])->name('estate.store');
    Route::get('download/{file}', [BangunanController::class, 'downloadMaster'])->name('download.master');
    Route::get('downloadPhoto/{file}', [BangunanController::class, 'downloadPhoto'])->name('download.photo');
    Route::get('estate-request', [EstateRequestController::class,'index'])->name('request.download');
    Route::post('estate-request', [BangunanController::class,'requestDownload'])->name('request.download');
    Route::get('estate-approve/{param}',[EstateRequestController::class,'approve'])->name('approve.download');
    Route::get('estate-reject/{param}',[EstateRequestController::class,'cancel'])->name('reject.download');
    Route::get('mylist_download',[EstateRequestController::class, 'mylistDownload'])->name('mylist.download');
    

});


