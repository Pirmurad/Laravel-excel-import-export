@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Customers') }}</div>

                    <div class="card-body">
                        <a class="btn btn-primary mb-2" href="{{ route('customers.export') }}">Export all customers</a>
                        <a class="btn btn-success mb-2" href="{{ route('customers.export_view') }}">Export from view</a>
                        <a class="btn btn-info mb-2" href="{{ route('customers.export_store') }}">Export to store</a>

                        <a class="btn btn-warning mb-2" href="{{ route('customers.export_format','Csv') }}">Download CSV</a>
                        <a class="btn btn-warning mb-2" href="{{ route('customers.export_format','Html') }}">Download HTML</a>
                        <a class="btn btn-warning mb-2" href="{{ route('customers.export_format','Dompdf') }}">Download PDF</a>

                        <a class="btn btn-secondary mb-2" href="{{ route('customers.export_sheets') }}">Export into Multiple Sheets</a>

                        <a class="btn btn-success mb-2" href="{{ route('customers.export_headingRow') }}">Export with Heading Row</a>

                        <a class="btn btn-danger mb-2" href="{{ route('customers.export_mapping') }}">Export Purchases</a>

                        <a class="btn btn-info mb-2" href="{{ route('customers.export_styling') }}">Export with Styling</a>

                        <a class="btn btn-dark mb-2" href="{{ route('customers.export_autosize') }}">Export with Autosize</a>
                        @include('customers.table',$customers)
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
