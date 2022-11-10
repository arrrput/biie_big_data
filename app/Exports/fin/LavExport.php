<?php

namespace App\Exports\fin;

use App\Models\fin\LavModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LavExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return LavModel::select('vendor_no','vendor_name','address','contact_person','contact_number','email')
                ->get();
    }

    public function headings(): array
    {
        return [
            'Vendor No',
            'Vendor Name',
            'Address',
            'Contact Person',
            'Contact No',
            'Email'
        ];
    }
}
