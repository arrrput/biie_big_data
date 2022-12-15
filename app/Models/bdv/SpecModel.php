<?php

namespace App\Models\bdv;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecModel extends Model
{
    use HasFactory;
    public $table = 'bdv_spec';

    protected $fillable = ['category', 'name','rate','occupied', 'price_sgd', 'price_idk',
                        'description','property', 'amenities', 'image'];
}
