<?php

namespace App\Exports;

use App\Models\user;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return user::all();
    }
    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Address',
            'Eamil',
            'Gender',
            'Phone',
            'Role',
            'Date of Birth',
        ];
    }
}
