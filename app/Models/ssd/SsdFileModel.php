<?php

namespace App\Models\ssd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SsdFileModel extends Model
{
    use HasFactory;
    protected  $table = 'ssd_file';
    protected $fillable = ['user_id', 'kode_ssd','name','id_category','id_sub_category','status_akses','status_request',
                        'due_date','schedule_reminder'];
}
