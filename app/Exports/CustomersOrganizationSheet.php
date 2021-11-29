<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;

class CustomersOrganizationSheet implements FromCollection, WithTitle
{
  private $organization;

  public function __construct($organization)
  {
      $this->organization = $organization;
  }

  public function collection()
  {
      return Customer::where('email','like','%'.$this->organization)->get();
  }

  public function title(): string
  {
      return 'Organization '. $this->organization;
  }
}
