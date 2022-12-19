<?php

namespace App\Models\est\ph;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhEngineDrawingModel extends Model
{
    use HasFactory;

    public $table = 'est_ph_engine';
    protected $fillable = ['id_user','kode_drawing', 'engine_series', 'engine_code', 'engine_type',
                'voltage_output', 'capacity', 'merk' ];

}
