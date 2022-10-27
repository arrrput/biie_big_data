<?php

namespace App\Models\hrga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDormModel extends Model
{
    use HasFactory;
    public $table = 'hrga_dorm';
    protected $fillable = ['blok','unit','name','id_dept','room_no','remark'];

}
