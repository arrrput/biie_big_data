<?php

namespace App\Models\aml;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermitDocumentModel extends Model
{
    use HasFactory;
    public $table = 'aml_permit_document';
    protected $fillable = ['name','permit_owner','permit_type','contract_type',
        'description','issued_date','document','start_date','end_date'];

}
