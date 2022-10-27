<?php

namespace App\Models\hrga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusRecruitmentModel extends Model
{
    use HasFactory;
    public $table = 'hrga_status_recruitment';
    protected $fillable = ['id', 'name'];
}
