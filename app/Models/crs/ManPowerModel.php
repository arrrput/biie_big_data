<?php

namespace App\Models\crs;

use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ManPowerModel extends Model
{

    use LogsActivity;
    use HasFactory;
    public $table = 'crs_man_power';
    protected $fillable = ['total_tenant', 'total_employee', 'total_foreign_worker'];

    protected static $logFillable = true;

    public function getActivitylogOptions(): LogOptions
    {
            return LogOptions::defaults()
            ->logOnly(['total_tenant', 'total_employee', 'total_foreign_worker']);
    }
                    
        public function getDescriptionForEvent(string $eventName): string
        {
            return $this->activity . " {$eventName} Oleh: " . Auth::user()->name;
        }

}
