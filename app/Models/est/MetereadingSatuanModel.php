<?php

namespace App\Models\est;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetereadingSatuanModel extends Model
{
    use HasFactory;
    public $table = 'table_est_satuan_metereading';
    protected $fillable = ['name'];
}
