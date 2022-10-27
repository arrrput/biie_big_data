<?php

namespace App\Exports\gmo;

use App\Models\gmo\ListInventory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InventoryExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ListInventory::select('gmo_list_jenis_komputer.name','merk','no_seri' ,'no_lisensi','processor','ram','ssd','hdd','keterangan')
                ->join('gmo_list_jenis_komputer' ,'gmo_list.id_jenis_komputer','gmo_list_jenis_komputer.id')
                ->get();
    }

    public function headings(): array
    {
        return [

            'Jenis Perangkat',
            'Merk',
            'No Seri',
            'No Licensi',
            'Processor',
            'RAM',
            'SSD',
            'HDD',
            'Keterangan'
        ];
    }

}
