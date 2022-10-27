<?php

namespace App\Models\pod;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportCargoModel extends Model
{
    use HasFactory;
    public $table = 'pod_export_cargo';
    protected $fillable = ['export_container', 'tonnage_in_loose', 'tonnage_cargo', 'total_teus',
            'total_package', 'total'];
}
