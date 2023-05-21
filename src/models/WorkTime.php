<?php

class WorkTime
{
    private $user_id;
    private $date;
    private $punch_in;
    private $punch_out;
    private $total_time;


    public function __construct(string $name,string $address)
    {
        
        $this->user_id = $user_id;
        $this->date = $date;
        $this->punch_in = $punch_in;
        $this->punch_out = $punch_out;
        $this->total_time = $total_time;
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