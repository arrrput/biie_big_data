<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\est\FactoryModel as EstFactoryModel;

class FactoryExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EstFactoryModel::select('table_est_factory_category.name as category','lot','name_tenant',
                'status_vacant',
                'hod','eol','land_area',
                'satuan')
                ->join('table_est_factory_category', 'table_estate_factory.id_factory_category','table_est_factory_category.id')
                ->get();;
    }

    public function headings(): array
    {
        return [
            'Category',
            'Lot',
            'Name Tenant',
            'Occupied',
            'Handover date',
            'End of lease',
            'Land Area',
            'Land Unit'
        ];
    }
}
