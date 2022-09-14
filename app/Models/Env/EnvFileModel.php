<?php

namespace App\Models\Env;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvFileModel extends Model
{
    use HasFactory;
    protected $table = 'env_file';
    protected $fillable = ['user_id','name','file', 'id_category', 'id_sub_category','kode_env',
                    'status_akses','status_request',
                    'due_date','schedule_reminder'];

}
