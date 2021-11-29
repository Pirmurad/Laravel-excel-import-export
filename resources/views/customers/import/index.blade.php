@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Customers Import') }}</div>

                    <div class="card-body">

                        @if(session('message'))
                          <div class="alert alert-info">{{ session('message') }}</div>
                        @endif

                        <form action="{{ route('importCustomers.import') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input class="form-control" type="file" name="import">
                            <br>
                            <select name="delimiter" class="form-control">
                                <option selected value=",">Delimiter , (comma)</option>
                                <option value=";">Delimiter ; (semicolon)</option>
                            </select>

                            <input type="submit" class="ptn btn-sm btn-secondary" value="Import File"/>
                        </form>

                        @include('customers.table',$customers)
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
