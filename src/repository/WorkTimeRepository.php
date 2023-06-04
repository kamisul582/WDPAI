<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/WorkTime.php';

class WorkTimeRepository extends Repository
{

    public function getWorkTimeTable(int $user_id)
    {   $sql = 'SELECT _date,punch_in,punch_out,total_time FROM public.work_time_table WHERE user_id = :user_id ORDER BY entry_id';
        $stmt = $this->database->connect()->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->execute();

        $table = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($table)) {
            return NULL;
        }
        #var_dump($table);
        return $table;
    }
     public function insertTime(int $user_id, $date, $time){
        $punched_in = $this->check_if_punched_in($user_id);
        if ($punched_in)
        {
            $sql = "UPDATE public.work_time_table SET punch_out = :time WHERE user_id = :user_id AND punch_out is NULL;";
            $stmt = $this->database->connect()->prepare($sql);   
            $stmt->execute(array('user_id' => $user_id,'time' => $time,));
        }
        else
        {
            $sql = "INSERT into public.work_time_table (user_id,_date,punch_in)
                values (:user_id, :date, :time)";
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->execute(array('user_id' => $user_id, 'date' => $date, 'time' => $time,));
        }
        
     }
     public function check_if_punched_in(int $user_id){
        $sql = "SELECT * FROM public.work_time_table WHERE user_id = :user_id ORDER BY entry_id DESC LIMIT 1";
        $stmt = $this->database->connect()->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        
        if ((!is_null($row['punch_in']) and is_null($row['punch_out']) ))
            return TRUE;
        else 
            return FALSE;

    }
}