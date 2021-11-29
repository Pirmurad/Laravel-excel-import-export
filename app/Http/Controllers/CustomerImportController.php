<?php

namespace App\Http\Controllers;

use App\Exports\CustomersExport;
use App\Exports\CustomersExportHeading;
use App\Exports\CustomersExportMapping;
use App\Exports\CustomersExportSheets;
use App\Exports\CustomersExportSize;
use App\Exports\CustomersExportStyling;
use App\Exports\CustomersExportView;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Imports\CustomersImport;
use App\Models\Customer;
use Maatwebsite\Excel\Facades\Excel;

class CustomerImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();

        return view('customers.import.index',compact('customers'));
    }

    public function import()
    {
        Excel::import(new CustomersImport(request('delimiter')),request()->file('import'));
        return redirect()->route('importCustomers.index')->withMessage('Successfully Imported.');
    }


}
