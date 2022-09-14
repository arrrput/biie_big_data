<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstSubCategory extends Model
{
    use HasFactory;
    protected $table = 'table_est_sub_category';
    protected $fillable=['id_est_category','name','id'];

    public function listSubKategori(){
    	return $this->belongsTo(BangunanModel::class);
    }
}
