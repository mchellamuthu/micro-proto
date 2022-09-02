<?php

namespace App\Domains\Customers\Services\Commands;

class UpdateCustomerCommand {
    private $name;
    private $email;
    private $phone;
    private $id;

    public function __construct($name,$email,$phone, $id) {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->id = $id;
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
    public function getId() : int
    {
        return $this->id;
    }
}
