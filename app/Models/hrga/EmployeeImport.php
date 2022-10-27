<?php

namespace App\Models\hrga;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return new EmployeeModel([
            'no_emp' => $row['no_emp'],
            'name' => $row['name'],
            'job_title' => $row['job_title'], 
            'designation' => $row['designation'], 
            'job_grade' => $row['job_grade'], 
            'education' => $row['education'],
            'department' => $row['department'],
            'join' => $row['join'],
            'sex' => $row['sex'],
            'status' => $row['status'],
            'child' => $row['child'],
            'dob' => $row['dob'],
            'place_of_birth' => $row['place_of_birth'],
            'stay' => $row['stay'],
            'kjp' => $row['kjp'],
            'npwp' => $row['npwp'],
            'nik' => $row['nik'],
            'status_emp' => $row['status_emp'],
            'no_hp' => $row['no_hp'],
            'religion' => $row['religion'],
            'email' => $row['email'],
            'no_rek' => $row['no_rek'],
            'address' => $row['address'],

        ]);


    }
}
