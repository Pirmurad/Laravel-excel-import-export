<?php

namespace App\Exports;

use App\Models\Purchase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class CustomersExportMapping implements FromCollection, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Purchase::with('customer')->get();
    }

    public function map($purchase): array
    {
        return [
            $purchase->id,
            $purchase->customer->fullname,
            $purchase->bank_acc_number,
            $purchase->company,
            $purchase->created_at->toDateString(),
            $purchase->updated_at->toDateString(),
        ];
    }
}
