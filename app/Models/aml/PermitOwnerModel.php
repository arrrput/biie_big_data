<?php

namespace App\Models\aml;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermitOwnerModel extends Model
{
    use HasFactory;
    public $table = 'aml_permit_owner';
    protected $fillable = ['name'];
    
}
