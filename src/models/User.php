<?php

class User
{   private $user_id;
    private $email;
    private $password;
    private $name;
    private $surname;
    private $employer_id;

    public function __construct(string $user_id, string $email,string $password,string $name,string $surname,string $employer_id)
    {
        $this->user_id = $user_id;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->employer_id = $employer_id;
    }
    public function getEmail(): string 
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function getName(): string 
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }
    
    public function getUser_id()
    {
        return $this->user_id;
    }
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }
    public function getEmployer_id()
    {
        return $this->employer_id;
    }
}