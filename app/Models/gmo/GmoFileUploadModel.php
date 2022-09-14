<?php

namespace App\Models\gmo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmoFileUploadModel extends Model
{
    use HasFactory;
    protected $table ='gmo_file_upload';
    protected $fillable = ['kode_gmo', 'file' ,'name'];
}
