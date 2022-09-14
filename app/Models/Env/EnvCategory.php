<?php

namespace App\Models\Env;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvCategory extends Model
{
    use HasFactory;
    protected $table = 'env_category';

    protected $fillable = ['name'];
}
