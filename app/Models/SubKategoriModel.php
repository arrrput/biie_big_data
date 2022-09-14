<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategoriModel extends Model
{
    use HasFactory;
    protected $table='sub_kategori';

    protected $fillable=['kategori_id','name','slug'];

    public function kategori(){
    	return $this->belongsTo(KategoriModel::class);
    }
}
