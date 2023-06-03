<?php

class Company
{   
    private $company_id;
    private $email;
    private $password;
    private $company_name;
    private $company_address;


    public function __construct(string $company_id, string $email,string $password,string $company_name,string $company_address)
    {
        $this->company_id = $company_id;
        $this->company_name = $company_name;
        $this->company_address = $company_address;
        $this->email = $email;
        $this->password = $password;
    }
    public function getCompanyId(): string 
    {
        return $this->company_id;
    }
    public function getEmail(): string 
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function getCompanyName(): string 
    {
        return $this->company_name;
    }
    public function getCompanyAddress()
    {
        return $this->company_address;
    }
}