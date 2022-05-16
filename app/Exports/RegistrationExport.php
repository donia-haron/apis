<?php

namespace App\Exports;

use App\Models\registration;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;

class RegistrationExport implements FromQuery, WithHeadings, WithMapping
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
            'Car Plate No.',
            'Created At',
            'Status',
            'Slot Name',
            'Leave Time',
            'Check In Time',
        ];
    }
    public function map($registration): array
    {
        return [
            $registration->user_id,
            $registration->car_id,
            $registration->date,
            $registration->status,
            $registration->slot_name,
            $registration->leave_time,
            $registration->checkin_time,
        ];
    }
}
