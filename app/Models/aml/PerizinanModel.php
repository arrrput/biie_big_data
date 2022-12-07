<?php

namespace App\Models\aml;

use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerizinanModel extends Model
{
    use LogsActivity;
    use HasFactory;
    public $table = 'aml_list_perizinan';
    protected $fillable = ['type_perjanjian','deskripsi', 'no_perjanjian','tgl_penerbitan',
                    'mitra', 'bussiness_owner', 'tgl_mulai', 'tgl_berakhir', 'tgl_perpanjang', 'document'];

    protected static $logFillable = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['type_perjanjian','deskripsi', 'no_perjanjian','tgl_penerbitan',
        'mitra', 'bussiness_owner', 'tgl_mulai', 'tgl_berakhir', 'tgl_perpanjang', 'document']);
    }
                
    public function getDescriptionForEvent(string $eventName): string
    {
        return $this->activity . " {$eventName} Oleh: " . Auth::user()->name;
    }
}
