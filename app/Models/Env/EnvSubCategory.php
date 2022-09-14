<?php

namespace App\Models\Env;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvSubCategory extends Model
{
    use HasFactory;
    protected $table = 'env_sub_category';

    protected $fillable = ['name','id_category'];
}
