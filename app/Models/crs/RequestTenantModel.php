<?php

namespace App\Models\crs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestTenantModel extends Model
{
    use HasFactory;
    public $table = 'crs_tanant_request';

    protected $fillable = ['name_tenant', 'description', 'id_department', 'target_completion', 'status',
                'received_by', 'pic', 'root_cause', 'correction'];
}
