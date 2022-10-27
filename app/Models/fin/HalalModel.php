<?php

namespace App\Models\fin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HalalModel extends Model
{
    use HasFactory;
    public $table = 'fin_list_halal';
    protected $fillable = ['name', 'due_date', 'reminder','document'];
}
