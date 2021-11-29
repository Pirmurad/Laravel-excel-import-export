<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomersExportHeading implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $customers =  Customer::all();

        $final_collection = [];

        foreach ($customers->chunk(3) as $cunk){
            $final_collection = array_merge($final_collection, $cunk->toArray(),[[]]);
        }
        return collect($final_collection);
    }

    public function headings(): array
    {
        return [
            '#',
            'Ad',
            'Soyad',
            'E-poçt',
            'Yaradılma tarixi',
            'Yenilenmə tarixi'
        ];
    }
}
