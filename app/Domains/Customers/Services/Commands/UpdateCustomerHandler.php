<?php

namespace App\Domains\Customers\Services\Commands;

use App\Domains\Customers\Models\Customer;
use App\Domains\Customers\Services\Commands\UpdateCustomerCommand;

class UpdateCustomerHandler {
    public function __invoke(UpdateCustomerCommand $command)
    {
    	Customer::where('id',$command->getId())->update([
            'name'=>$command->getName(),
            'email'=>$command->getEmail(),
            'phone'=>$command->getPhone(),
        ]);

    }
}
