<?php

namespace App\Models\hrga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitmentModel extends Model
{
    use HasFactory;
    public $table = 'hrga_recruitment';

    protected $fillable = ['id_department', 'job_position', 'id_progress','due_date'];

}
