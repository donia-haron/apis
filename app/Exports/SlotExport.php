<?php

namespace App\Exports;

use App\Models\parkingslot;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SlotExport implements FromQuery, WithHeadings, WithMapping
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
        return parkingslot::query()->where('parking_id', $this->id);
    }
    public function headings(): array
    {
        return [
            'Name',
            'Level',
            'Status',
            'Created At'
        ];
    }
    public function map($slot): array
    {
        return [
            $slot->name,
            $slot->level,
            $slot->status,
            $slot->created_at,
        ];
    }
}
