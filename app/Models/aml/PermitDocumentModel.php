<?php

namespace App\Models\aml;

use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PermitDocumentModel extends Model
{
    use HasFactory;
    Use LogsActivity;
    public $table = 'aml_permit_document';
    protected $fillable = ['name','permit_owner','permit_type','contract_type',
        'description','issued_date','document','start_date','end_date'];

    protected static $logFillable = true;

    public function getActivitylogOptions(): LogOptions
    {
            return LogOptions::defaults()
            ->logOnly(['name','permit_owner','permit_type','contract_type',
            'description','issued_date','document','start_date','end_date']);
    }
                    
        public function getDescriptionForEvent(string $eventName): string
        {
            return $this->activity . " {$eventName} Oleh: " . Auth::user()->name;
        }

}
