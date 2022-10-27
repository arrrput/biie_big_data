<?php

namespace App\Models\est;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstTownTypeModel extends Model
{
    use HasFactory;

    public $table = 'table_est_townc_type';
    protected $fillable = ['name'];

}
