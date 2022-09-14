<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $fillable=['name','slug'];

    public function subKategori(){
        return $this->hasMany(SubKategoriModel::class,'kategori_id','id');
    }
    
}
