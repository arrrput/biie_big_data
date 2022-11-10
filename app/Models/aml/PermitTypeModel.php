<?php

namespace App\Models\aml;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermitTypeModel extends Model
{
    use HasFactory;
    public $table = 'aml_permit_type';

    protected $fillable = ['id_permit_owner','name'];
}
