<?php

class Company
{
    private $name;
    private $address;


    public function __construct(string $name,string $address)
    {
        
        $this->name = $name;
        $this->address = $address;
    }
    public function name(): string 
    {
        return $this->name;
    }

    public function address()
    {
        return $this->address;
    }
}