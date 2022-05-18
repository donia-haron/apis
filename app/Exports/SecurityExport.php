<?php

namespace App\Exports;

use App\Models\parkingsecurity;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SecurityExport implements FromQuery, WithHeadings, WithMapping
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
            'Created At'
        ];
    }
    public function map($security): array
    {
        return [
            $security->security_id,
            $security->name,
            $security->email,
            $security->gender,
            $security->address,
            $security->dob,
            $security->work_hours,
            $security->phone,
            $security->status,
            $security->created_at,
        ];
    }
}
