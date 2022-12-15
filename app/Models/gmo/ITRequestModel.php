<?php

namespace App\Models\gmo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ITRequestModel extends Model
{
    use HasFactory;
    public $table = 'gmo_it_request';

    protected $fillable = ['id_user', 'id_department', 'type_request', 'jenis_dukungan', 'email_req', 'user_req', 'internet_req', 'backup_req',
                'download_req', 'perangkat_komputer_req', 'desain_req', 'email_desc', 'username_desc', 'download_desc', 'download_perangkat',
                'deskripsi', 'verify_hod', 'work_by', 'status', 'catatan', 'date_start', 'date_end','verify_user'];
}
