<?php

namespace App\Models\est;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstTownCenterModel extends Model
{
    use HasFactory;
    public $table = 'table_estate_townc';
    public $fillable = ['stall_no', 'name_stall','hod', 'remark','id_type'];

}
