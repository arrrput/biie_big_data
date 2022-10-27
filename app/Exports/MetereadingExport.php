<?php

namespace App\Exports;

use App\Models\est\MetereadingModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MetereadingExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MetereadingModel::select('table_est_satuan_metereading.name as type','location','electricity_consump',
                'water_consump','start_date','end_date')
                ->join('table_est_satuan_metereading', 'id_type','table_est_satuan_metereading.id')
                ->get();
    }

    public function headings(): array
    {
        return [
            'Type',
            'Location',
            'Electricity Consump',
            'Water Consump',
            'Start Date',
            'End Date',
            'Remark'
        ];
    }
}
