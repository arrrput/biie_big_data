<?php

namespace App\Models\crs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManPowerModel extends Model
{
    use HasFactory;
    public $table = 'crs_man_power';
    protected $fillable = ['total_tenant', 'total_employee', 'total_foreign_worker'];
}
