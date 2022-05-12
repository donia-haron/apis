<?php

namespace App\Exports;

use App\Models\parkingsecurity;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SecurityExport implements FromQuery, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;
    public function __construct(int $id)
    {
        $this->id = $id;
    }
    public function query()
    {
        return parkingsecurity::query()->where('parking_id', $this->id);
    }
    public function headings(): array
    {
        return [
            'National ID',
            'Name',
            'Email',
            'Gender',
            'Address',
            'Date of Birth',
            'Work Hours',
            'Phone',
            'Status',
        ];
    }
}
