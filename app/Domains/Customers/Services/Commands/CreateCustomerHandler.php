<?php
namespace App\Domains\Customers\Services\Commands;

use App\Domains\Customers\Models\Customer;

class CreateCustomerHandler
{
    public function __invoke(CreateCustomerCommand $command)
    {
    	$product = new Customer();
    	$product->name = $command->getName();
    	$product->email = $command->getEmail();
    	$product->phone = $command->getPhone();
    	$product->save();
    }
}
