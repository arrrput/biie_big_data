<?php

namespace App\Models\est;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstDormCategoryModel extends Model
{
    use HasFactory;

    public $table = 'table_est_block_dorm';
    protected $fillable = ['id','name'];

}
