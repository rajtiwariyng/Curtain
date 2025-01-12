<?php

namespace App\Exports;

use App\Models\Appointment;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookQueryExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $appointments = Appointment::where('status', '0')
            ->select([
                'id',
                'name',
                'email',
                'mobile',
                'address',
                'pincode',
                'city',
                'country',
                'created_at',
            ])
            ->get();

        $appointments->transform(function ($appointment, $key) {
            // Set serial number
            $appointment->id = $key + 1;

            if ($appointment->created_at) {
                $appointment->created_at = Carbon::parse($appointment->created_at)->format('Y-m-d h:i:s'); // Formats to 'Y-m-d'
            }

            return $appointment;
        });

        return $appointments;
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
            'Name',
            'Email',
            'Mobile',
            'Address',
            'Pincode',
            'City',
            'Country',
            'Created At',
        ];
    }
}
