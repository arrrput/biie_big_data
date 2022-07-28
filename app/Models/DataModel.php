<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataModel extends Model
{
    use HasFactory;
    protected $table = 'table_data';
    protected $fillable=['kode_bangunan', 'name', 'type','keterangan'];

    public function bangunan(){
    	return $this->belongsTo(BangunanModel::class);
    }

    public function download(){
    	return $this->belongsTo(EstateDownload::class);
    }
    public function listdowload(){
    	return $this->belongsTo(EstateDownload::class);
    }
}
