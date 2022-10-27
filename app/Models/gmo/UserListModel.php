<?php

namespace App\Models\gmo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserListModel extends Model
{
    use HasFactory;

    public $table = 'gmo_user_list';
    protected $fillable = ['name', 'department', 'ip', 'email','internet', 'jenis', 'id_no', 'akun_pengguna', 'tgl_serahkan', 'tgl_kembalikan', 'lokasi'];


}
