<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class CustomersExportView implements FromView
{
    /**
     * @return View
     */

    public function view(): View
    {
        return view('customers.table', [
            'customers' => Customer::all()
        ]);
    }
}
