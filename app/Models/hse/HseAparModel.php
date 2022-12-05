<?php

namespace App\Models\hse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HseAparModel extends Model
{
    use HasFactory;

    public $table = 'hse_apar';

    protected $fillable = ['no_apar', 'lokasi', 'periode', 'tgl', 'tekanan_tabung', 'fisik_tabung'];
   
}
