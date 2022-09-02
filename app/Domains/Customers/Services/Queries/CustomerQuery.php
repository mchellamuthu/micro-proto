<?php
namespace App\Domains\Customers\Services\Queries;

use App\Domains\Customers\Models\Customer;

class CustomerQuery
{

    public function getData()
    {
        $customers = Customer::get();
        return $customers;
    }

    public function customer($id)
    {
        $customer = Customer::findOrFail($id);
        return $customer;
    }

}
