<?php

namespace App\Models\pod;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityPermitModel extends Model
{
    use HasFactory;
    public $table = 'pod_facility_permit';
    protected $fillable = ['license_no', 'date_issue', 'permission_type', 'validity_period', 'instantion_permit'];

}
