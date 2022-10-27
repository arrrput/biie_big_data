<?php

namespace App\Models\est;

use Maatwebsite\Excel\Concerns\ToModel;

class FactoryImport implements ToModel
{
    
    public function model(array $row)
    {
        return new FactoryModel([
            'id_factory_category' => $row[0],
            'lot' => $row[1],
            'name_tenant' => $row[2], 
            'status_vacant' => $row[3], 
            'hod' => $row[4], 
            'eol' => $row[5], 
            'land_area' => $row[6], 
            'satuan' => $row[7], 
            'status_building' => $row[8], 

        ]);
    }
}
