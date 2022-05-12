<?php

namespace App\Exports;

use App\Models\parkingslot;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SlotExport implements FromQuery, WithHeadings
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
            'Status'
        ];
    }
}
