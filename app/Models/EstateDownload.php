<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstateDownload extends Model
{
    use HasFactory;
    protected $table = 'table_estate_download';
    protected $fillable = ['user_id','kode_bangunan','status'];

    public function bangunan(){
    	return $this->belongsTo(BangunanModel::class);
    }

    public function data(){
        return $this->hasMany(DataModel::class,'kode_bangunan','kode_bangunan');
    }

}
