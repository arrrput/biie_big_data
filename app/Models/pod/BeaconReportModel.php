<?php

namespace App\Models\pod;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeaconReportModel extends Model
{
    use HasFactory;
    public $table = 'pod_beaco_report';
    protected $fillable = ['dsi','type', 'location_name', 'power_source', 'root_cause', 'number_day','remark'];

}
