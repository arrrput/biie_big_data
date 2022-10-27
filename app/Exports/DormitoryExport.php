<?php

namespace App\Exports;

use App\Models\est\EstDormitoryModel as EstEstDormitoryModel;
use App\Models\EstDormitoryModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DormitoryExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EstEstDormitoryModel::select('table_est_block_dorm.name as name_block','table_estate_dormitory.unit','name_tenant',
                'table_estate_dormitory.hod','status_vacant','vacant','remark')
                ->join('table_est_block_dorm','table_estate_dormitory.block' ,'table_est_block_dorm.id')
                ->get();
    }

    public function headings(): array
    {
        return [

            'Block',
            'Unit',
            'Name Tenant',
            'Hand over date',
            'Status',
            'Vacant',
            'remark'

        ];
    }


}
