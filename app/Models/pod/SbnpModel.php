<?php

namespace App\Models\pod;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SbnpModel extends Model
{
    use HasFactory;
    public $table = 'pod_sbnp_report';
    protected $fillable = ['name_location','position', 'dsi', 'type', 'power_source', 'beacon_construction','color_light',
            'construction_height','construction_color','visible_distance','remark'];

}
