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

        // Transform the collection to set serial number and format created_at to only show date
        $appointments->transform(function ($appointment, $key) {
            // Set serial number
            $appointment->id = $key + 1;

            // Check if created_at is a valid date and format it to 'Y-m-d'
            if ($appointment->created_at) {
                $appointment->created_at = Carbon::parse($appointment->created_at)->toDateString(); // Formats to 'Y-m-d'
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
