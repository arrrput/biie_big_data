<?php

namespace App\Models\ims;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDocumentModel extends Model
{
    use HasFactory;
    public $table ='ims_master_document';
    protected $fillable = ['no_document', 'title', 'hirarki_doc','id_dept','document', 'remark', 'stamp'];

}
