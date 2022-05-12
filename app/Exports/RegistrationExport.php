<?php

namespace App\Exports;

use App\Models\registration;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class RegistrationExport implements FromQuery, WithHeadings
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
        return registration::query()->where('parking_id', $this->id);
    }
    public function headings(): array
    {
        return [
            'User National ID',
            'Date',
            'Status',
            'Slot Name',
            'Leave Time',
            'Check In Time',
        ];
    }
}
