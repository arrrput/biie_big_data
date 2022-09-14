<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstateDownload extends Model
{
    use HasFactory;
    protected $table = 'table_estate_download';
    protected $fillable = ['id','kode_bangunan','user_id','status','id_data'];

    public function bangunan(){
    	return $this->belongsTo(BangunanModel::class);
    }

    public function dataDownload(){
    	return $this->belongsTo(DataModel::class, 'id_data');
    }


}
