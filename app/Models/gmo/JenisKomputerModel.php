<?php

namespace App\Models\gmo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKomputerModel extends Model
{
    use HasFactory;
    public $table = 'gmo_list_jenis_komputer';

    protected $fillable = ['id','name'];
}
