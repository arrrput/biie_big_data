<?php

namespace App\Models\aml;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerizinanModel extends Model
{
    use HasFactory;
    public $table = 'aml_list_perizinan';
    protected $fillable = ['type_perjanjian','deskripsi', 'no_perjanjian','tgl_penerbitan',
                    'mitra', 'bussiness_owner', 'tgl_mulai', 'tgl_berakhir', 'tgl_perpanjang', 'document'];
}
