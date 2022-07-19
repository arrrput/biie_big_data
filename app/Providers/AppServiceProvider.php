<?php

namespace App\Providers;

use App\Models\EstateDownload;
use App\Models\KategoriModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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

        view()->share('shareData', $kategori);
        view()->share('req_download', $request_download);
    }
}
