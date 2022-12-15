<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\gmo\ITRequestModel;
use App\Models\ims\DownloadMaster;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        config(['app.locale' =>'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');

        // $kategori = KategoriModel::all();
        // $request_download = EstateDownload::where('status','=', 0)
        //                     ->count();
        $ims_req = DownloadMaster::where('status',0)->count();

        // // // ims
        view()->share('ims_req', $ims_req);
        // view()->share('shareData', $kategori);
        // view()->share('req_download', $request_download);

        // share notif it request
        view()->composer('layouts.master', function ($view) 
        {
            $it_request_notif = ITRequestModel::where('verify_hod', 0)
                            ->where('id_department',Auth::user()->id_department)
                            ->count();
            
            //...with this variable
            $view->with('it_request_notif', $it_request_notif );    
        });

        view()->composer('layouts.master', function($view) {
            $theme = Cookie::get('theme');
            if ($theme == 'darkmode') {
                $theme = 'dark';
            }

            $view->with('theme', $theme);
        });

        view()->composer('layouts.master-auth', function($view) {
            $theme = Cookie::get('theme');
            if ($theme == 'darkmode') {
                $theme = 'dark';
            }

            $view->with('theme', $theme);
        });

        // if(env('APP_ENV')!== 'local'){
        //     URL::forceScheme('https');
        // }
        
    }
}
