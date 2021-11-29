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
use App\Models\Customer;
use Maatwebsite\Excel\Facades\Excel;

class CustomerExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();

        return view('customers.export.index',compact('customers'));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */

    public function export()
    {
        return Excel::download(new CustomersExport(),'customers.xlsx');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */

    public function export_view()
    {
        return Excel::download(new CustomersExportView(),'customers.xlsx');
    }

    /**
     * @return bool
     */

    public function export_store()
    {
        Excel::store(new CustomersExport(), 'customers/customers-'.now()->toDateString().'.xlsx','public');
         return 'ok';
    }

    /**
     * @param $format
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */

    public function export_format($format)
    {
        $extension = strtolower($format);
        if (in_array($format,['Mpdf','Dompdf','tcpdf'])) $extension = 'pdf';

        return Excel::download(new CustomersExport(),'customers.'.$extension,$format);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */

    public function export_sheets()
    {
        return Excel::download(new CustomersExportSheets(),'customers.xlsx');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */

    public function export_headingRow()
    {
        return Excel::download(new CustomersExportHeading(),'customers.xlsx');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */

    public function export_mapping()
    {
        return Excel::download(new CustomersExportMapping(),'customers.xlsx');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */

    public function export_styling()
    {
        return Excel::download(new CustomersExportStyling(),'customers.xlsx');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */

    public function export_autosize()
    {
        return Excel::download(new CustomersExportSize(),'customers.xlsx');
    }

}
