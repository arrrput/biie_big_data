<?php

namespace App\Models\est;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactoryModel extends Model
{
    use HasFactory;
    public $table = 'table_estate_factory';
    protected $fillable = ['id','lot','name_tenant','id_factory_category','status_vacant','hod','eol','land_area','satuan','status_building'];

    public function kategori(){
        return $this->hasOne(FactoryCategoryModel::class,'id', 'id_factory_category');
    }

}
