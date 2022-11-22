<?php

namespace App\Models\cdd;

use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CddProposalStatus extends Model
{
    use LogsActivity;
    use HasFactory;
    use SoftDeletes;


    public $table = 'cdd_proposal_status';
    protected $fillable = ['name','pic','donation', 'tgl','address','contact_person'];

    protected static $logName = 'Proposal status CDD';
    protected static $logFillable = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name','pic','donation', 'tgl','address','contact_person']);
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return $this->name . " {$eventName} Oleh: " . Auth::user()->name;
    }

}
