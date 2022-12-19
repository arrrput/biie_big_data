<?php

namespace App\Models\est\ph;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhEngineFileModel extends Model
{
    use HasFactory;
    public $table = 'est_engine_file';
    protected $fillable = ['kode_drawing','manual_book','document'];
}
