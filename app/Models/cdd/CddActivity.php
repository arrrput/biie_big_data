<?php

namespace App\Models\cdd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CddActivity extends Model
{
    use HasFactory;
    public $table = 'cdd_activity_record';

    protected $fillable = ['activity','pic','date','budget','remark'];

}
