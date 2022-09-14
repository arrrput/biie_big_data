<?php

namespace App\Models\Env;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvFileUploadModel extends Model
{
    use HasFactory;
    protected $table = 'env_upload_file';

    protected $fillable = ['kode_env', 'file','name'];
}
