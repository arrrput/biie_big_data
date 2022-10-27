<?php

namespace App\Models\est;

use Maatwebsite\Excel\Concerns\ToModel;

class TownCenterImport implements ToModel  
{
    
    public function model(array $row)
    {
        return new EstTownCenterModel([
            'id_type' => $row[0],
            'stall_no' => $row[1],
            'name_stall' => $row[2], 
            'hod' => $row[3], 
            'remark' => $row[4], 
        ]);
    }
}
