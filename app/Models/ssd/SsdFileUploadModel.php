<?php

namespace App\Models\ssd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SsdFileUploadModel extends Model
{
    use HasFactory;
    protected $table = 'ssd_file_upload';

    protected $fillable = ['kode_ssd','file','name'];
}
