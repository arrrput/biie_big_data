<?php

namespace App\Models\ims;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadMaster extends Model
{
    use HasFactory;
    public $table = 'ims_download_master';
    protected $fillable = ['user_id','id_doc','status','date_approve'];
}
