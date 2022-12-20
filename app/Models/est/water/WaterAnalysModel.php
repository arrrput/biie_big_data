<?php

namespace App\Models\est\water;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterAnalysModel extends Model
{
    use HasFactory;
    public $table =  'est_water_wia';
    protected $fillable =['parameter','unit','result', 'standart_max' ,'method'];

}
