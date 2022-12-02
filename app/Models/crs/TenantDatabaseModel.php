<?php

namespace App\Models\crs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantDatabaseModel extends Model
{
    use HasFactory;
    public $table ='crs_tenant_database';
    protected $fillable = ['company','image', 'type_product', 'start_date', 'occupied_factory', 'contact_no',
                        'pic', 'designation', 'email', 'hr_manager', 'remark','total_employee'];

}
