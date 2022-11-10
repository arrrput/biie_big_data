<?php

namespace App\Models\hrga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GasolineModel extends Model
{
    use HasFactory;
    public $table = 'hrga_gasoline';
    protected $fillable = ['merk_plat_no','driver','km','date','price'];

}
