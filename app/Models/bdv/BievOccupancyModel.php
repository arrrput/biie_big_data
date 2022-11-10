<?php

namespace App\Models\bdv;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BievOccupancyModel extends Model
{
    use HasFactory;
    public $table = 'bdv_ocupancy';

    protected $fillable = ['room','company','guest','period','occupied','cekin_cekout','guest_name'];

}
