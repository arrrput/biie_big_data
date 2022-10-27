<?php

namespace App\Models\est;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstDormitoryModel extends Model
{
    use HasFactory;
    public $table = 'table_estate_dormitory';

    protected $fillable = ['block','unit','name_tenant', 'status_vacant', 'vacant', 'hod', 'remark'];
}
