<?php

namespace App\Models\hse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AparModel extends Model
{
    use HasFactory;
    public $table = 'hse_apar';

    protected $fillable = ['name', 'lokasi', 'kondisi'];
}
