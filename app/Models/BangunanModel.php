<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BangunanModel extends Model
{
    use HasFactory;
    protected $table = 'table_bangunan';
    protected $fillable =['kode_bangunan', 'user_id', 'title','deskripsi','status','name',
    'id_est_category','id_est_sub_category','obsolete', 'status_akses', 'due_date'];



    public function dataEstate(){
        return $this->hasMany(DataModel::class,'kode_bangunan','kode_bangunan');
    }

    public function estKategori(){
        return $this->hasOne(EstCategory::class,'id', 'id_est_category');
    }

    public function estSubKategori(){
        return $this->hasOne(EstSubCategory::class,'id', 'id_est_sub_category');
    }

    public function kategori(){
        return $this->hasOne(KategoriBangunan::class,'id','kategori_bangunan_id');
    }

    public function download(){
        return $this->hasOne(EstateDownload::class,'kode_bangunan','kode_bangunan');
    }
}
