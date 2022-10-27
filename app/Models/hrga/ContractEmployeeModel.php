<?php

namespace App\Models\hrga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractEmployeeModel extends Model
{
    use HasFactory;
    public $table = 'hrga_contract_employee';

    protected $fillable = ['name', 'date_end'];
}
