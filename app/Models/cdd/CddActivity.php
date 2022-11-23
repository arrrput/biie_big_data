<?php

namespace App\Models\cdd;

use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CddActivity extends Model
{
    use LogsActivity;
    use HasFactory;
    public $table = 'cdd_activity_record';

    protected $fillable = ['activity','pic','date','budget','remark'];

    protected static $logName = 'Activity CDD';
    protected static $logFillable = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['activity','pic','date','budget','remark']);
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return $this->activity . " {$eventName} Oleh: " . Auth::user()->name;
    }
}
