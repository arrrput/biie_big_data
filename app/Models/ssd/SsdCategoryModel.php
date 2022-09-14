<?php

namespace App\Models\ssd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SsdCategoryModel extends Model
{
    use HasFactory;
    protected $table = 'ssd_category';

    protected $fillable = ['name'];
}
