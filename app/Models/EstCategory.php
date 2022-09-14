<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstCategory extends Model
{
    use HasFactory;
    protected $table = 'table_est_category';
    protected $fillable=['id','name'];


    public function kategory(){
    	return $this->belongsTo(BangunanModel::class);
    }
}
