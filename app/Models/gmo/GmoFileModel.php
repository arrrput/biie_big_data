<?php

namespace App\Models\gmo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmoFileModel extends Model
{
    use HasFactory;
    protected $table = 'gmo_file';
    protected $fillable = ['user_id', 'kode_gmo', 'name', 'id_category', 'id_sub_category', 'status_akses',
                        'status_request', 'due_date', 'schedule_reminder'];
}
