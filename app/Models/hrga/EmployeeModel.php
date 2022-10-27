<?php

namespace App\Models\hrga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    use HasFactory;
    public $table = 'hrga_employee';

    protected $fillable = ['no_emp', 'name', 'job_title', 'designation', 'job_grade', 'education','department',
        'join', 'sex', 'status', 'child', 'dob','place_of_birth', 'stay','religion', 'kjp', 'npwp',
        'nik', 'status_emp', 'no_hp','email', 'no_rek', 'address'];
}
