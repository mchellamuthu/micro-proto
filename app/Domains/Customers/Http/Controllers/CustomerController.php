<?php

namespace App\Domains\Customers\Http\Controllers;

use App\Domains\Customers\Models\Customer;
use App\Domains\Customers\Services\Commands\CommandBus;
use App\Domains\Customers\Services\Commands\CreateCustomerCommand;
use App\Domains\Customers\Services\Commands\UpdateCustomerCommand;
use App\Domains\Customers\Services\Queries\CustomerQuery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = new CustomerQuery();
        return $query->getData();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->query('name');
        $email = $request->query('email');
        $phone = $request->query('phone');
        $command =  new CreateCustomerCommand($name,$email,$phone);
        $this->commandBus->handle($command);
        return response()->json([
            'message' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Domains\Customers\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($customer)
    {
        $query = new CustomerQuery();
        $data = $query->customer($customer);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Domains\Customers\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customer)
    {
        $name = $request->query('name');
        $email = $request->query('email');
        $phone = $request->query('phone');
        $command =  new UpdateCustomerCommand($name,$email,$phone,$customer);
        $this->commandBus->handle($command);
        return response()->json([
            'message' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Domains\Customers\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy( $customer)
    {
        //
    }
}
