<?php

namespace App\Models\fin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcurementModel extends Model
{
    use HasFactory;
    public $table = 'fin_procurement';
    protected $fillable = ['no_pr','no_po','status','category','id_department','no_do','no_inv','document'];
}
