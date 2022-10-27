<?php

namespace App\Models\pod;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportCargoModel extends Model
{
    use HasFactory;
    public $table = 'pod_import_cargo';
    protected $fillable = ['import_container', 'tonnage_in_loose', 'tonnage_cargo', 'total_teus',
            'total_package', 'total'];

}
