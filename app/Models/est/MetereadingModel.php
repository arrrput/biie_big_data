<?php

namespace App\Models\est;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetereadingModel extends Model
{
    use HasFactory;

    public $table = 'table_estate_metereading';
    protected $fillable = ['id_type','location', 'start_date', 'end_date', 'electricity_consump', 'water_consump'];

}
