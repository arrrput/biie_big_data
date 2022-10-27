<?php

namespace App\Models\hrga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobGradeModel extends Model
{
    use HasFactory;
    public $table = 'hrga_job_grade';
    protected $fillable = ['name'];

}
