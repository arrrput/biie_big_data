<?php

namespace App\Models\ssd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SsdSubCategoryModel extends Model
{
    use HasFactory;
    protected $table = 'ssd_sub_category';
    protected $fillable = ['name', 'id_category'];
}
