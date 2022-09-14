<?php

use App\Http\Controllers\BangunanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\env\EnvController;
use App\Http\Controllers\est\EstSopController;
use App\Http\Controllers\est\FileEstController;
use App\Http\Controllers\EstateRequestController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\gmo\GmoFileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ssd\SsdFileController;
use App\Http\Controllers\UserController;
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

Route::get('/push', function () {
    return view('push');
});

Route::get('/dashboard', function () {
    return view('dashboard',[DashboardController::class,'index']);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');

    Route::get('home',[HomeController::class, 'index'])->name('home');
    Route::get('sendmail',[HomeController::class, 'sendnotification'])->name('home.sendemail');
    Route::resource('users', UserController::class);

    //Role
    Route::resource('role', RoleController::class);
    Route::get('role',[RoleController::class,'index'])->name('roles.index');
    Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
    
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');

    //file manager
    Route::get('filemanager', [FileManagerController::class, 'index']);
    
    //estate
    Route::resource('estate', BangunanController::class);
    Route::post('estate/store', [BangunanController::class,'store'])->name('estate.store');
    Route::post('estate/update', [BangunanController::class,'update'])->name('estate.update');
    Route::get('download/{file}', [BangunanController::class, 'downloadMaster'])->name('download.master');
    Route::get('downloadPhoto/{file}', [BangunanController::class, 'downloadPhoto'])->name('download.photo');
    Route::get('estate-request', [EstateRequestController::class,'index'])->name('estate.est-download');
    Route::post('estate-request', [BangunanController::class,'requestDownload'])->name('request.download');
    Route::get('estate-edit/{param}', [BangunanController::class,'view'])->name('estate-edit');
    Route::get('estate-approve/{param}',[EstateRequestController::class,'approve'])->name('approve.download');
    Route::get('estate-reject/{param}',[EstateRequestController::class,'cancel'])->name('reject.download');
    Route::get('mylist_download',[EstateRequestController::class, 'mylistDownload'])->name('mylist.download');
    Route::get('est_cat/{param}',[BangunanController::class, 'getSubCategory'])->name('sub_cat');
    Route::delete('est-delete/{id}',[BangunanController::class, 'destroy'])->name('est-delete');
    Route::post('est-filter', [BangunanController::class,'filter'])->name('est-filter');
    Route::get('estate/file/folder', [FileEstController::class, 'index'])->name('estate.file');
    Route::get('ajax/{param}/estate',[FileEstController::class,'getDataAjax'])->name('ajax.estate.data');
    // arsitektural
    Route::get('estate/category/arsitektural', [FileEstController::class,'arsitektural'])->name('estate.arsitektural');
    Route::post('estate/ajax/arsitektural', [FileEstController::class,'ajax'])->name('estate.ajax.arsitektural');
    // struktural
    Route::get('estate/category/struktural', [FileEstController::class,'struktural'])->name('estate.struktural');
    Route::post('estate/ajax/struktural', [FileEstController::class,'ajaxStrl'])->name('estate.ajax.struktural');

    // mep
    Route::get('estate/category/mep', [FileEstController::class,'mep'])->name('estate.mep');
    Route::post('estate/ajax/mep', [FileEstController::class,'ajaxMep'])->name('estate.ajax.mep');

    //request estate
    Route::post('estate-req', [FileEstController::class,'requestDownloadArs'])->name('estate.req.download');

    // estate folder
    Route::get('estate/{param}/title', [FileEstController::class,'getTitle'])->name('estate.title');
    Route::get('estate/{param}/category',[FileEstController::class, 'getFolderCat'])->name('estate.kategori');
    Route::get('estate/{param}/arsitektur', [FileEstController::class, 'arsitektur'])->name('estate.ars');
    Route::get('estate/{param}/struktur', [FileEstController::class, 'struktur'])->name('estate.str');
    Route::get('estate/{param}/mep', [FileEstController::class,'mapping'])->name('estate.mapping');
    Route::delete('est-file-delete/{id}',[FileEstController::class, 'destroy'])->name('est-file-delete');
    Route::post('estate/addData', [FileEstController::class, 'addData'])->name('estate.update_data');
    Route::get('view_pdf/{filename}',[FileEstController::class, 'viewPDF'])->name('view.pdf');

    //sop estate
    Route::get('estate/sop/form', [EstSopController::class, 'index'])->name('estate.sop');
    Route::post('estate/sop/store',[EstSopController::class, 'store'])->name('estate.sop.store');
    Route::post('estate/get/sop',[EstSopController::class, 'getSop'])->name('get.sop');
    Route::delete('est-sop/del/{id}',[EstSopController::class, 'destroy'])->name('sop-delete');
    Route::get('est-sop-edit/{param}', [EstSopController::class,'edit'])->name('est-sop-edit');
    Route::get('estate/folder/sop/{param}', [EstSopController::class, 'detail'])->name('estate.sop.folder');
    Route::post('estate/sop/ajaxsop',[EstSopController::class,'ajaxSop'])->name('est.ajax.sop');
    Route::post('estate/sop/ajaxwi',[EstSopController::class,'ajaxWi'])->name('est.ajax.wi');
    Route::post('estate/sop/ajaxform',[EstSopController::class,'ajaxForm'])->name('est.ajax.form');


    //ENV Route
    Route::prefix("env")->group(function(){
        Route::get('/', [EnvController::class, 'index'])->name('env');
        Route::get('env_cat/{param}', [EnvController::class, 'getSubCategory'])->name('env.cat');
        Route::post('env/store', [EnvController::class, 'store'])->name('env.store');
        Route::get('{param}/env_file',[EnvController::class, 'show'])->name('env.show');
        Route::get('download/{file}', [EnvController::class, 'downloadMaster'])->name('env.download');
        // edit
        Route::get('env-edit/{param}', [EnvController::class,'view'])->name('env-edit');
        //ajax get data file
        Route::get('ajax/{param}/env',[EnvController::class,'getDataAjax'])->name('env.ajax.data');
        Route::get('file/env',[EnvController::class,'getFileAjax'])->name('env.ajax.file');
        // delete file
        Route::delete('delete-file/{id}',[EnvController::class, 'destroy'])->name('env.delete.file');
        Route::delete('delete-data/{id}', [EnvController::class, 'deleteData'])->name('env.delete.data');
        // update data
        Route::post('update_data', [EnvController::class, 'updateData'])->name('env.update_data');
        //folder
        Route::get('folder', [EnvController::class, 'folder'])->name('env.folder');
        Route::get('folder/{param}/category', [EnvController::class, 'folderCategory'])->name('env.folder.category');
        //file in folder
        Route::get('{param}/file', [EnvController::class, 'fileInFolder'])->name('env.file.folder');
        // download env
        Route::get('download/{file}', [EnvController::class, 'downloadEnv'])->name('env.download');

     });

    //  SSD Route
    Route::prefix("ssd")->group(function(){
        Route::get('/', [SsdFileController::class, 'index'])->name('ssd');
        Route::get('ssd_cat/{param}', [SsdFileController::class, 'getSubCategory'])->name('ssd.cat');
        Route::post('ssd/store', [SsdFileController::class, 'store'])->name('ssd.store');
        Route::get('{param}/ssd_file',[SsdFileController::class, 'show'])->name('ssd.show');
        Route::get('download/{file}', [SsdFileController::class, 'downloadMaster'])->name('ssd.download');
     }); 

    //  GMO Route
     Route::prefix("gmo")->group(function(){
        Route::get('/', [GmoFileController::class, 'index'])->name('gmo');
        Route::get('gmo_cat/{param}', [GmoFileController::class, 'getSubCategory'])->name('gmo.cat');
        Route::post('ssd/store', [SsdFileController::class, 'store'])->name('ssd.store');
        Route::get('{param}/ssd_file',[SsdFileController::class, 'show'])->name('ssd.show');
        Route::get('download/{file}', [SsdFileController::class, 'downloadMaster'])->name('ssd.download');
     }); 

});


