<?php

namespace App\Models\pod;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipArriveModel extends Model
{
    use HasFactory;
    public $table = 'pod_ship_arrive';
    protected $fillable = ['name_ship','gt_flag','date_arrive', 'port_origin', 'demolish', 'debarkation', 'type_of_goods',
        'destinantion_port', 'payload', 'embarkation', 'trayek_status_l_t', 'trayek_status_m_ch_k','gt','departure',
        'validate_period_rpt','port_location'];

    
}
