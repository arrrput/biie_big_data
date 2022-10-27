<?php

namespace App\Models\est;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactoryCategoryModel extends Model
{
    use HasFactory;
    public $table ='table_est_factory_category';
    public $fillable = ['name'];
}
