<?php

namespace App\Exports;

use App\Models\est\EstTownCenterModel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TownCenterExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EstTownCenterModel::select('table_est_townc_type.name as category','stall_no','name_stall',
                'hod','remark')
                ->join('table_est_townc_type', 'id_type','table_est_townc_type.id')
                ->get();;
    }

    public function headings(): array
    {
        return [
            'Category',
            'Stall No',
            'Name of Stall Holder',
            'Handover date',
            'Remark'
        ];
    }
}
