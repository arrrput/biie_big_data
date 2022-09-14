<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataModel extends Model
{
    use HasFactory;
    protected $table = 'table_data';
    protected $fillable=['id','kode_bangunan', 'name','keterangan','id_category'];

    public function getDownload(){
        return $this->hasOne(EstateDownload::class, 'id_data', 'id');
    }

    public function bangunan(){
    	return $this->belongsTo(BangunanModel::class);
    }

}
