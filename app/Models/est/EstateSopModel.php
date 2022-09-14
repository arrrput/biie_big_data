<?php

namespace App\Models\est;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstateSopModel extends Model
{
    use HasFactory;

    protected $table = 'table_est_sop';
    protected $fillable = ['no_revisi','name', 'jenis_sop', 'user_id', 'obsolete', 'file'];
}
