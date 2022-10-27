<?php

namespace App\Models\est;

use Maatwebsite\Excel\Concerns\ToModel;

class DormitoryImport implements ToModel
{
    protected $fillable = ['block','unit','name_tenant', 'status_vacant', 'vacant', 'hod', 'remark'];
    public function model(array $row)
    {
        return new EstDormitoryModel([
            'block' => $row[0],
            'unit' => $row[1],
            'name_tenant' => $row[2], 
            'status_vacant' => $row[3], 
            'vacant' => $row[4], 
            'hod' => $row[5], 
            'remark' => $row[6], 
        ]);
    }
}
