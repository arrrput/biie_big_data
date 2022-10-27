<?php

namespace App\Exports\gmo;

use App\Models\gmo\UserListModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserListExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return UserListModel::select('gmo_user_list.name as username','department.name','gmo_user_list.email', 'gmo_user_list.ip', 
                'gmo_user_list.internet', 'gmo_user_list.jenis', 'gmo_user_list.lokasi',
                'gmo_user_list.tgl_serahkan', 'tgl_kembalikan')
                ->join('department' ,'gmo_user_list.department','department.id')
                ->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Department',
            'Email',
            'IP Address',
            'Akses Internet',
            'jenis',
            'lokasi',
            'Tgl Penyerahan',
            'Tgl Pengembalian'
        ];
    }
}
