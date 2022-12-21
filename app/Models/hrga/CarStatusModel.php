<?php

namespace App\Models\hrga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarStatusModel extends Model
{
    use HasFactory;

    public $table= 'hrga_car_status';

    protected $fillable = ['name', 'car_name', 'plat_no'];
}
