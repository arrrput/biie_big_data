<?php

namespace App\Models\gmo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmoSubCategoryModel extends Model
{
    use HasFactory;
    protected $table = 'gmo_sub_category';
    protected $fillable = ['name', 'id_category'];

}
