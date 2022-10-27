<?php

namespace App\Models\gmo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListInventory extends Model
{
    use HasFactory;
    public $table = 'gmo_list';

    protected $fillable = ['id_jenis_komputer', 'merk', 'no_seri', 'no_lisensi',
                    'processor', 'ram', 'ssd', 'hdd', 'keterangan'];

}
