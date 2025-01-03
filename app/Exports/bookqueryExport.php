<?php

namespace App\Exports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookQueryExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Appointment::where('status', '0')
            ->select([
                'id',
                'uniqueid',
                'name',
                'email',
                'mobile',
                'address',
                'pincode',
                'city',
                'country',
                'status',
                'created_at',
            ])
            ->get();
    }

    /**
     * Define the headings for the export file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Unique ID',
            'Name',
            'Email',
            'Mobile',
            'Address',
            'Pincode',
            'City',
            'Country',
            'Status',
            'Created At',
        ];
    }
}
