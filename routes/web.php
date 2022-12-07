<?php

use App\Http\Controllers\aml\PerizinanController;
use App\Http\Controllers\aml\PermitController;
use App\Http\Controllers\BangunanController;
use App\Http\Controllers\bdv\BievOccupancyController;
use App\Http\Controllers\cdd\CddController;
use App\Http\Controllers\crs\InvestorVisitController;
use App\Http\Controllers\crs\TenantController;
use App\Http\Controllers\crs\TenantDatabseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\env\EnvController;
use App\Http\Controllers\est\EstDormitoryController;
use App\Http\Controllers\est\EstSopController;
use App\Http\Controllers\est\FileEstController;
use App\Http\Controllers\est\MetereadingController;
use App\Http\Controllers\est\PowerController;
use App\Http\Controllers\EstateRequestController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\gmo\GmoFileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ssd\SsdFileController;
use App\Http\Controllers\est\TownCenterController;
use App\Http\Controllers\est\UtilitiesController;
use App\Http\Controllers\fin\HalalController;
use App\Http\Controllers\fin\LavController;
use App\Http\Controllers\fin\ProcurementController;
use App\Http\Controllers\gmo\GmoListController;
use App\Http\Controllers\gmo\ITRequestController;
use App\Http\Controllers\gmo\UserListController;
use App\Http\Controllers\hrga\ContractEmployeeController;
use App\Http\Controllers\hrga\EmpDormController;
use App\Http\Controllers\hrga\EmployeeController;
use App\Http\Controllers\hrga\RecruitmentController;
use App\Http\Controllers\hse\HseController;
use App\Http\Controllers\ims\AksesDocumentController;
use App\Http\Controllers\ims\ExternalDocController;
use App\Http\Controllers\ims\MasterDocumentController;
use App\Http\Controllers\pod\BeaconController;
use App\Http\Controllers\pod\ExportCargoController;
use App\Http\Controllers\pod\ImportCargoController;
use App\Http\Controllers\pod\PODController;
use App\Http\Controllers\pod\PortFacilityController;
use App\Http\Controllers\pod\SbnpController;
use App\Http\Controllers\ssd\FireAlarmController;
use App\Http\Controllers\ssd\FiresafetyController;
use App\Http\Controllers\UserController;
use App\Models\crs\TenantDatabaseModel;
use App\Models\hrga\EmployeeModel;
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

// Route::get('/', function () {
//     return view('auth.login' );
// });

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
    Route::get('/',[DashboardController::class, 'index'])->name('dashboard');

    Route::get('home',[HomeController::class, 'index'])->name('home');
    Route::get('sendmail',[HomeController::class, 'sendnotification'])->name('home.sendemail');
    Route::resource('users', UserController::class);

    //update profile
    Route::post('update_profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('update_password', [ProfileController::class, 'updatePass'])->name('profile.password');

    //Role
    Route::resource('role', RoleController::class);
    Route::get('role',[RoleController::class,'index'])->name('roles.index');
    Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
    
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');

    //file manager
    Route::get('filemanager', [FileManagerController::class, 'index']);
    
    //estate
    Route::resource('estate', BangunanController::class);
    //estate list
    Route::get('estate/list/factory', [FileEstController::class, 'list'])->name('estate.list');
    Route::post('estate/list/add', [FileEstController::class, 'listAdd'])->name('estate.list.add');
    Route::get('estate/list/show/{id}', [FileEstController::class, 'listShow'])->name('estate.list.show');
    Route::delete('estate/list/delete/{id}', [FileEstController::class, 'destroyList'])->name('estate.list.delete');
    Route::get('estate/export/list',[FileEstController::class, 'export_excel'])->name('estate.list.export');
    Route::post('estate/import/list',[FileEstController::class, 'import_excel'])->name('estate.list.import');

    // estate utilities
    Route::get('estate/utilities/status', [UtilitiesController::class, 'index'])->name('estate.utilities');


    //estate Power
    Route::get('estate/power/status', [PowerController::class, 'index'])->name('estate.power');

    // estate dorm
    Route::post('estate/dorm/store', [EstDormitoryController::class, 'store'])->name('estate.dorm.store');
    Route::get('estate/dorm/index', [EstDormitoryController::class, 'index'])->name('estate.dorm.index');
    Route::get('estate/dorm/show/{id}', [EstDormitoryController::class, 'listShow'])->name('estate.dorm.show');
    Route::delete('estate/dorm/delete/{id}', [EstDormitoryController::class, 'destroy'])->name('estate.dorm.delete');
    Route::get('estate/export/dorm',[EstDormitoryController::class, 'export_excel'])->name('estate.dorm.export');
    Route::post('estate/import/dorm',[EstDormitoryController::class, 'import_excel'])->name('estate.dorm.import');

    //estate town center
    Route::get('estate/town/index', [TownCenterController::class, 'index'])->name('estate.town.index');
    Route::post('estate/town/store', [TownCenterController::class, 'store'])->name('estate.town.store');
    Route::get('estate/town/show/{id}', [TownCenterController::class, 'listShow'])->name('estate.town.show');
    Route::delete('estate/town/delete/{id}', [TownCenterController::class, 'destroy'])->name('estate.town.delete');
    Route::get('estate/export/town',[TownCenterController::class, 'export_excel'])->name('estate.town.export');
    Route::post('estate/import/town',[TownCenterController::class, 'import_excel'])->name('estate.town.import');

    //estate metereading
    Route::get('estate/meter/index', [MetereadingController::class, 'index'])->name('estate.meter.index');
    Route::post('estate/meter/store', [MetereadingController::class, 'store'])->name('estate.meter.store');
    Route::get('estate/meter/show/{id}', [MetereadingController::class, 'listShow'])->name('estate.meter.show');
    Route::get('estate/export/meter',[MetereadingController::class, 'export_excel'])->name('estate.meter.export');

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
        Route::get('file/gmo',[SsdFileController::class,'getFileAjax'])->name('ssd.ajax.file');
        //ajax get data file
        Route::get('ajax/{param}/ssd',[SsdFileController::class,'getDataAjax'])->name('ssd.ajax.data');
        // edit
        Route::get('ssd-edit/{param}', [SsdFileController::class,'view'])->name('ssd.ssd-edit');
        // delete file
        Route::delete('delete-file/{id}',[SsdFileController::class, 'destroy'])->name('gmo.delete.file');
        Route::delete('delete-data/{id}', [SsdFileController::class, 'deleteData'])->name('gmo.delete.data');

        // firesafety
        Route::get('/firesafety', [FiresafetyController::class, 'index'])->name('ssd.firesafety');
        Route::post('/firesafety/add', [FiresafetyController::class, 'store'])->name('ssd.firesafety.add');
        Route::get('/firesafety/show/{id}', [FiresafetyController::class, 'show'])->name('ssd.firesafety.show');
        Route::delete('/firesafety/delete/{id}', [FiresafetyController::class, 'destroy'])->name('ssd.firesafety.delete');

        // fireAlarm
        Route::get('/firealarm', [FireAlarmController::class, 'index'])->name('ssd.firealarm');
        Route::post('/firealarm/add', [FireAlarmController::class, 'store'])->name('ssd.firealarm.add');
        Route::get('/firealarm/show/{id}', [FireAlarmController::class, 'show'])->name('ssd.firealarm.show');
        Route::delete('/firealarm/delete/{id}', [FireAlarmController::class, 'destroy'])->name('ssd.firealarm.delete');
     }); 

    //  GMO Route
     Route::prefix("gmo")->group(function(){
        Route::get('/', [GmoFileController::class, 'index'])->name('gmo');
        Route::get('gmo_cat/{param}', [GmoFileController::class, 'getSubCategory'])->name('gmo.cat');
        Route::post('gmo/store', [GmoFileController::class, 'store'])->name('gmo.store');
        Route::get('{param}/ssd_file',[SsdFileController::class, 'show'])->name('ssd.show');
        Route::get('download/{file}', [SsdFileController::class, 'downloadMaster'])->name('ssd.download');
        Route::get('file/gmo',[GmoFileController::class,'getFileAjax'])->name('gmo.ajax.file');
        // edit
        Route::get('gmo-edit/{param}', [GmoFileController::class,'view'])->name('gmo-edit');
        //ajax get data file
        Route::get('ajax/{param}/gmo',[GmoFileController::class,'getDataAjax'])->name('env.ajax.data');
        // delete file
        Route::delete('delete-file/{id}',[GmoFileController::class, 'destroy'])->name('gmo.delete.file');
        Route::delete('delete-data/{id}', [GmoFileController::class, 'deleteData'])->name('gmo.delete.data');
        // update data
        Route::post('update_data', [GmoFileController::class, 'updateData'])->name('gmo.update_data');

        // gmo list inventory
        Route::get('list', [GmoListController::class, 'index'])->name('gmo.list');
        Route::post('list/add', [GmoListController::class, 'store'])->name('gmo.list.add');
        Route::get('list/show/{id}', [GmoListController::class, 'show'])->name('gmo.list.show');
        Route::delete('list/delete/{id}', [GmoListController::class, 'destroy'])->name('gmo.list.delete');
        Route::get('export/list',[GmoListController::class, 'export_excel'])->name('gmo.list.export');
        Route::post('estate/import/town',[TownCenterController::class, 'import_excel'])->name('estate.town.import');

        //gmo user list
        Route::get('user_list', [UserListController::class, 'index'])->name('gmo.user_list');
        Route::post('user_list/add', [UserListController::class, 'store'])->name('gmo.user_list.add');
        Route::get('user_list/show/{id}', [UserListController::class, 'show'])->name('gmo.list.show');
        Route::delete('user_list/delete/{id}', [UserListController::class, 'destroy'])->name('gmo.user_list.delete');
        Route::get('export/user_list',[UserListController::class, 'export_excel'])->name('gmo.user_list.export');

        // IT Request
        Route::get('it_request', [ITRequestController::class, 'index'])->name('gmo.it_request');
        Route::post('it_request/add', [ITRequestController::class, 'store'])->name('gmo.it_request.add');
        Route::get('it_request/show/{id}', [ITRequestController::class, 'show'])->name('gmo.it_request.show');
        Route::delete('it_request/delete/{id}', [ITRequestController::class, 'destroy'])->name('gmo.it_request.delete');
        Route::get('list_request', [ITRequestController::class, 'requestList'])->name('gmo.list_request');
        Route::post('it_request/update_progress', [ITRequestController::class, 'updateProgress'])->name('gmo.it_request.update_progress');

     }); 

     //  HRGA Route
     Route::prefix("hrga")->group(function(){
        Route::get('employee',[EmployeeController::class, 'index'])->name('hrga.employee');
        Route::post('hrga/employee/list',[EmployeeController::class, 'import_excel'])->name('hrga.employee.import');
        Route::post('hrga/employee/add', [EmployeeController::class, 'store'])->name('hrga.employee.add');
        Route::get('employee/show/{id}', [EmployeeController::class, 'show'])->name('hrga.list.show');
        Route::delete('employee/delete/{id}', [EmployeeController::class, 'destroy'])->name('hrga.employee.delete');
        //contract add 
        Route::get('get_emp', [ContractEmployeeController::class, 'index'])->name('hrga.contrac_emp');
        Route::post('hrga/contract/add', [ContractEmployeeController::class, 'store'])->name('hrga.contract.add');
        Route::get('contract/show/{id}', [ContractEmployeeController::class, 'show'])->name('hrga.contract.show');
        Route::delete('contract/delete/{id}', [ContractEmployeeController::class, 'destroy'])->name('hrga.contract.delete');
        //recruitment
        Route::get('recruitment', [RecruitmentController::class, 'index'])->name('hrga.recruitment');
        Route::post('hrga/recruitment/add', [RecruitmentController::class, 'store'])->name('hrga.recruitment.add');
        Route::get('recruitment/show/{id}', [RecruitmentController::class, 'show'])->name('hrga.recruitment.show');
        Route::delete('recruitment/delete/{id}', [RecruitmentController::class, 'destroy'])->name('hrga.recruitment.delete');

        // gasoline
        Route::get('gasoline', [EmployeeController::class, 'gasoline'])->name('hrga.gasoline');
        Route::get('gasoline/show/{id}', [EmployeeController::class, 'showGas'])->name('hrga.gasoline.show');
        Route::post('hrga/gasoline/add', [EmployeeController::class, 'storeGas'])->name('hrga.gasoline.add');
        Route::delete('gasoline/delete/{id}', [EmployeeController::class, 'destroyGas'])->name('hrga.gasoline.delete');

        // employee dorm
        Route::get('dorm', [EmpDormController::class, 'index'])->name('hrga.dorm');
        Route::get('dorm/show/{id}', [EmpDormController::class, 'show'])->name('hrga.dorm.show');
        Route::post('hrga/dorm/add', [EmpDormController::class, 'store'])->name('hrga.dorm.add');
        Route::delete('dorm/delete/{id}', [EmpDormController::class, 'destroy'])->name('hrga.dorm.delete');

    });

    //  Finance Route
    Route::prefix("fin")->group(function(){
        Route::get('halal',[HalalController::class, 'index'])->name('fin.halal');
        Route::post('halal/add', [HalalController::class, 'store'])->name('fin.halal.add');
        Route::get('halal/show/{id}', [HalalController::class, 'show'])->name('fin.halal.show');
        Route::delete('halal/delete/{id}', [HalalController::class, 'destroy'])->name('fin.halal.delete');
        Route::get('halal/download/{file}', [HalalController::class, 'downloadDoc'])->name('fin.download.halal');
        
        //procurement
        Route::get('procurement',[ProcurementController::class, 'index'])->name('fin.procurement');
        Route::post('procurement/add', [ProcurementController::class, 'store'])->name('fin.procurement.add');
        Route::get('procurement/show/{id}', [ProcurementController::class, 'show'])->name('fin.procurement.show');
        Route::delete('procurement/delete/{id}', [ProcurementController::class, 'destroy'])->name('fin.procurement.delete');
        Route::get('procurement/download/{file}', [ProcurementController::class, 'downloadDoc'])->name('fin.download.procurement');

        //LAV Status
        Route::get('lav',[LavController::class, 'index'])->name('fin.lav');
        Route::post('lav/add', [LavController::class, 'store'])->name('fin.lav.add');
        Route::get('lav/show/{id}', [LavController::class, 'show'])->name('fin.lav.show');
        Route::delete('lav/delete/{id}', [LavController::class, 'destroy'])->name('fin.lav.delete');
        Route::get('lav/download', [LavController::class, 'export_excel'])->name('fin.download.lav');
        Route::post('lav/import',[LavController::class, 'import_excel'])->name('fin.import');
    }); 

    Route::prefix("aml")->group(function(){
        Route::get('perizinan',[PerizinanController::class, 'index'])->name('aml.perizinan');
        Route::post('perizinan/add', [PerizinanController::class, 'store'])->name('aml.perizinan.add');
        Route::get('perizinan/show/{id}', [PerizinanController::class, 'show'])->name('aml.perizinan.show');
        Route::delete('perizinan/delete/{id}', [PerizinanController::class, 'destroy'])->name('aml.perizinan.delete');
        Route::get('download_contract/{file}', [PerizinanController::class, 'downloadContract'])->name('aml.download_contract');

        //permit
        Route::get('permit',[PermitController::class, 'index'])->name('aml.permit');
        Route::post('permit/add', [PermitController::class, 'store'])->name('aml.permit.add');
        Route::get('permit/show/{id}', [PermitController::class, 'show'])->name('aml.permit.show');
        Route::delete('permit/delete/{id}', [PermitController::class, 'destroy'])->name('aml.permit.delete');
        Route::get('permit_owner/{param}', [PermitController::class, 'getPermitType'])->name('aml.permit_owner');
        Route::get('download_permit/{file}', [PermitController::class, 'downloadPermit'])->name('aml.download_permit');
    });

    Route::prefix("pod")->group(function(){
        Route::get('index',[PODController::class, 'index'])->name('pod');

    });

    Route::prefix("crs")->group(function(){
        Route::get('index',[TenantController::class, 'index'])->name('crs');
        Route::post('tenant/add', [TenantController::class, 'store'])->name('crs.tenant.add');
        Route::get('tenant/show/{id}', [TenantController::class, 'show'])->name('crs.tenant.show');
        Route::delete('tenant/delete/{id}', [TenantController::class, 'destroy'])->name('crs.tenant.delete');
        // manpower
        Route::get('manpower',[TenantController::class, 'listManPower'])->name('crs.list_manpower');
        Route::post('manpower/add', [TenantController::class, 'storeManPower'])->name('crs.manpower.add');
        Route::get('manpower/show/{id}', [TenantController::class, 'showMan'])->name('crs.manpower.show');
        Route::delete('manpower/delete/{id}', [TenantController::class, 'destroyMan'])->name('crs.manpower.delete');

        // Investor
        Route::get('visitor',[InvestorVisitController::class, 'index'])->name('crs.investor_add');
        Route::post('add_visitor',[InvestorVisitController::class, 'store'])->name('crs.investor_add.store');

        // tenant database
        Route::get('tenant_data',[TenantDatabseController::class, 'index'])->name('crs.tenant_db');
        Route::post('tenant_data/add', [TenantDatabseController::class, 'store'])->name('crs.tenant_data.add');
        Route::get('tenant_data/show/{id}', [TenantDatabseController::class, 'show'])->name('crs.tenant_data.show');
        Route::delete('tenant_data/delete/{id}', [TenantDatabseController::class, 'destroy'])->name('crs.tenant_data.delete');

        //tenant list
        Route::get('alltenant',[TenantDatabseController::class, 'list'])->name('crs.alltenant');
    });

    Route::prefix("pod")->group(function(){
        Route::get('index',[PODController::class, 'index'])->name('pod');
        Route::post('ship_arrive/add', [PODController::class, 'store'])->name('pod.ship_arrive.add');
        Route::delete('ship_arrive/delete/{id}', [PODController::class, 'destroy'])->name('pod.ship_arrive.delete');
        Route::get('ship_arrive/show/{id}', [PODController::class, 'show'])->name('pod.ship_arrive.show');
        // cargo import
        Route::get('cargo.import',[ImportCargoController::class, 'index'])->name('pod.cargo.import');
        Route::post('cargo-import/add', [ImportCargoController::class, 'store'])->name('pod.cargo-import.add');
        Route::get('cargo-import/show/{id}', [ImportCargoController::class, 'show'])->name('pod.cargo-import.show');
        Route::delete('cargo-import/delete/{id}', [ImportCargoController::class, 'destroy'])->name('pod.cargo-import.delete');
        // cargo export
        Route::get('cargo.export',[ExportCargoController::class, 'index'])->name('pod.cargo.export');
        Route::post('cargo-export/add', [ExportCargoController::class, 'store'])->name('pod.cargo-export.add');
        Route::get('cargo-export/show/{id}', [ExportCargoController::class, 'show'])->name('pod.cargo-export.show');
        Route::delete('cargo-export/delete/{id}', [ExportCargoController::class, 'destroy'])->name('pod.cargo-export.delete');
        // Sbnp report
        Route::get('sbnp',[SbnpController::class, 'index'])->name('pod.sbnp');
        Route::post('sbnp/add', [SbnpController::class, 'store'])->name('pod.sbnp.add');
        Route::get('sbnp/show/{id}', [SbnpController::class, 'show'])->name('pod.sbnp.show');
        Route::delete('sbnp/delete/{id}', [SbnpController::class, 'destroy'])->name('pod.sbnp.delete');
        // Beacon
        Route::get('beacon',[BeaconController::class, 'index'])->name('pod.beacon');
        Route::post('beacon/add', [BeaconController::class, 'store'])->name('pod.beacon.add');
        Route::get('beacon/show/{id}', [BeaconController::class, 'show'])->name('pod.beacon.show');
        Route::delete('beacon/delete/{id}', [BeaconController::class, 'destroy'])->name('pod.beacon.delete');
        // Port Facility
         Route::get('port_permit',[PortFacilityController::class, 'index'])->name('pod.port_permit');
         Route::post('port_permit/add', [PortFacilityController::class, 'store'])->name('pod.port_permit.add');
         Route::get('port_permit/show/{id}', [PortFacilityController::class, 'show'])->name('pod.port_permit.show');
         Route::delete('port_permit/delete/{id}', [PortFacilityController::class, 'destroy'])->name('pod.port_permit.delete');
    });

    // ims
    Route::prefix("ims")->group(function(){
        Route::get('master-doc/add_doc',[MasterDocumentController::class, 'index'])->name('ims.master_doc');
        Route::post('master-doc/add', [MasterDocumentController::class, 'store'])->name('ims.master_doc.add');
        Route::get('master-doc/show/{id}', [MasterDocumentController::class, 'show'])->name('ims.master-doc.show');
        Route::delete('master-doc/delete/{id}', [MasterDocumentController::class, 'destroy'])->name('ims.master-doc.delete');
        Route::get('download/{file}', [MasterDocumentController::class, 'downloadMaster'])->name('ims.download.master');
        Route::get('master-doc/file_doc',[AksesDocumentController::class, 'index'])->name('ims.file_doc');
        Route::get('master-doc/{file}/viewpdf',[AksesDocumentController::class, 'viewPdf'])->name('ims.viewpdf');
        Route::post('master-doc/request', [AksesDocumentController::class, 'requestDownload'])->name('ims.master_doc.request');
        Route::get('master-doc/request-access',[AksesDocumentController::class, 'request'])->name('ims.master_doc.approve');
        Route::get('master-doc/request-app/{id}',[AksesDocumentController::class, 'approve'])->name('ims.master_doc.request-app');
        Route::get('master-doc/request-reject/{id}',[AksesDocumentController::class, 'reject'])->name('ims.master_doc.request-reject');

        // eksternal document
        Route::get('external-doc',[ExternalDocController::class, 'index'])->name('ims.external_doc');
        Route::post('external-doc/add', [ExternalDocController::class, 'store'])->name('ims.external_doc.add');    
        Route::get('external-doc/show/{id}', [ExternalDocController::class, 'show'])->name('ims.external_doc.show');   
        Route::get('external-download/{file}', [ExternalDocController::class, 'downloadMaster'])->name('ims.external-download.master'); 
        Route::delete('external-doc/delete/{id}', [ExternalDocController::class, 'destroy'])->name('ims.external-doc.delete');
    });

    // cdd
    Route::prefix("cdd")->group(function(){
        Route::get('/',[CddController::class, 'index'])->name('cdd');
        Route::get('proposal/show/{id}', [CddController::class, 'show'])->name('cdd.proposal.show');
        Route::post('proposal/add', [CddController::class, 'store'])->name('cdd.proposal.add');
        Route::delete('proposal/delete/{id}', [CddController::class, 'destroy'])->name('cdd.proposal.delete');
        
        Route::get('activity',[CddController::class, 'activity'])->name('cdd.activity');
        Route::post('activity/add', [CddController::class, 'storeAct'])->name('cdd.activity.add');
        Route::get('activity/show/{id}', [CddController::class, 'showAct'])->name('cdd.activity.show');
        Route::delete('activity/delete/{id}', [CddController::class, 'destroyAct'])->name('cdd.activity.delete');
    });


    // bdv
    Route::prefix("bdv")->group(function(){
        Route::get('index',[BievOccupancyController::class, 'index'])->name('bdv');
        Route::get('occcupancy/show/{id}', [BievOccupancyController::class, 'show'])->name('bdv.occcupancy.show');
        Route::post('occcupancy/add', [BievOccupancyController::class, 'store'])->name('bdv.occcupancy.add');
        Route::delete('occcupancy/delete/{id}', [BievOccupancyController::class, 'destroy'])->name('bdv.occcupancy.delete');
        
    });

    //  HSE Route
    Route::prefix("hse")->group(function(){

        Route::get('index',[HseController::class, 'index'])->name('hse');
        Route::post('incident/add', [HseController::class, 'store'])->name('hse.incident.add');
        Route::get('incident/show/{id}', [HseController::class, 'show'])->name('hse.incident.show');
        Route::delete('incident/delete/{id}', [HseController::class, 'destroy'])->name('hse.incident.delete');
    });

    
});


