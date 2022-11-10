<?php

namespace App\Models\fin;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class LavImport extends Model implements ToModel
{
    public function model(array $row)
    {
        return new LavModel([
            'vendor_no' => $row[0],
            'vendor_name' => $row[1],
            'address' => $row[2], 
            'contact_person' => $row[3], 
            'contact_number' => $row[4], 
            'email' => $row[5], 

        ]);
    }
}
