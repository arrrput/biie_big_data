<?php

namespace App\Models\est\ph;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DwSwitchouseModel extends Model
{
    use HasFactory;

    public $table = 'est_power_dw_switchouse';

    protected $fillable = ['id_user', 'name','substation','merk','outgoing','breaker', 'operating_voltage',
                        'incoming','manual_book','document'];

}
