<?php

namespace App\Imports;

use App\Models\Customer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class CustomersImportLarge implements ToModel, WithBatchInserts  //, WithChunkReading, ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'name'=> $row[1],
            'surname'=>$row[2],
            'email' =>$row[3]
        ]);
    }

    public function batchSize(): int
    {
        return 1000;  // 100 setirlik Excel fayli
    }

//    public function chunkSize(): int
//    {
//        return 1000;  // 100 setirlik Excel fayli
//    }
}
