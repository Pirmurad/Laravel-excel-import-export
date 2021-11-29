<?php

namespace App\Imports;

use App\Models\Customer;
use App\Models\Purchase;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomersImportRelationships implements ToModel
{
    private $customers;

    public function __construct()
    {
        $this->customers = Customer::select('id','name','surname')->get()
            ->keyBy(function ($item){
                return $item->name . ' '. $item->surname;
            })->toArray();
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Purchase([
            'customer_id' => $this->getCustomerId($row[1], $row(2)),
            'bank_acc_number' => $row[3],
            'company' => $row[4]
        ]);
    }

//    private function getCustomerIdDB($name,$surname)
//    {
//        $customer = Customer::where('name',$name)->where('surname',$surname)->first();
//
//        if (!$customer) return null;
//
//        return $customer->id;
//    }


    private function getCustomerId($name,$surname)
    {
        $customer = $this->customers[$name.' '.$surname] ?? null;

        if (!$customer) return null;

        return $customer['id'];
    }
}
