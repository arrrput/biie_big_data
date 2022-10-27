<?php

namespace App\Models\ims;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HirarkiDocModel extends Model
{
    use HasFactory;
    public $table ='ims_hirarki_doc';
    protected  $fillable = ['name'];
}
