<?php

namespace App\Models\ssd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FsIncidentModel extends Model
{
    use HasFactory;

    public $table = 'ssd_firesafety_incident_record';

    protected $fillable = ['fire_engine', 'waktu_keluar', 'waktu_tiba', 'kembali', 'team_leader', 'waktu_respon',
                    'anggota_pemadam', 'nama', 'alamat', 'umur', 'jenis_kelamin', 'keterangan_korban', 'keterangan_umum'];

}
