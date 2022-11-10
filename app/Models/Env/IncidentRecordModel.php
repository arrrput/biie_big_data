<?php

namespace App\Models\env;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentRecordModel extends Model
{
    use HasFactory;

    public $table  = 'env_incident_record';
    protected $fillable = ['user_id', 'tenant_name', 'incident', 'incident_date', 'close_date', 'remark', 'document'];

}
