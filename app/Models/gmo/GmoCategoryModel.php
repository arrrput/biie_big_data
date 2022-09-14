<?php

namespace App\Models\gmo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmoCategoryModel extends Model
{
    use HasFactory;
    protected $table = 'gmo_category';
    protected $fillable = ['name'];
}
