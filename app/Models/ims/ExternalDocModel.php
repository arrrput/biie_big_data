<?php

namespace App\Models\ims;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalDocModel extends Model
{
    use HasFactory;

    protected $table = 'ims_external_doc';
    protected $fillable = ['no_document', 'title', 'hirarki_doc','document'];

}
