<?php
namespace App\Domains\Customers\Services\Commands;

class CreateCustomerCommand
{
    private $name;
    private $email;
    private $phone;

    public function __construct($name,$email,$phone) {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function getName() : string
    {
        return $this->name;
    }
     public function getEmail() : string
    {
        return $this->email;
    }
    public function getPhone() : string
    {
        return $this->phone;
    }
}
