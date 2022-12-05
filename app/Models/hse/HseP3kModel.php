<?php

namespace App\Models\hse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HseP3kModel extends Model
{
    use HasFactory;
    public $table = 'hse_p3k';

    protected $fillable = ['no_p3k', 'lokasi' ,'tgl', 'nama', 'contact'];

}
