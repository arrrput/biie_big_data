<?php

namespace App\Models\hse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HseIncidentModel extends Model
{
    use HasFactory;

    public $table = 'hse_incident_report';

    protected $fillable = ['nama', 'tgl', 'jam', 'id_department', 'kategori_kecelakaan', 'penyebab', 'bagian_terluka',
                        'alat_penyebab', 'kronologi', 'analisa_kejadian', 'tindakan_perbaikan', 'tindakan_pencegahan'];

   
}
