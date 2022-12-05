<?php

namespace App\Models\ssd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FsFireAlarmModel extends Model
{
    use HasFactory;

    public $table = 'ssd_firesafety_fire_alarm';

    protected $fillable = ['lokasi','break_glass', 'smoke_detector', 'detector_panas', 'alarm',
                    'jumlah', 'inspection', 'keterangan'];
}
