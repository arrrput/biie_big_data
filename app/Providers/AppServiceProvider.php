<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\DataModel;
use App\Models\KategoriModel;
use App\Models\EstateDownload;
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

        $kategori = KategoriModel::all();
        $request_download = EstateDownload::where('status','=', 0)
                            ->count();
        $ims_req = DownloadMaster::where('status',0)->count();

        // ims
        view()->share('ims_req', $ims_req);
        view()->share('shareData', $kategori);
        view()->share('req_download', $request_download);

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
        
    }
}
