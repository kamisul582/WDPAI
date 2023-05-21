<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/WorkTime.php';

class WorkTimeRepository extends Repository
{

    public function getWorkTimeTable(int $user_id): array
    {
        $stmt = $this->database->connect()->prepare('
            SELECT _date,punch_in,punch_out,total_time FROM public.work_time_table WHERE user_id = :user_id');
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->execute();

        $table = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($table)) {
            return NULL;
        }
        #var_dump($table);
        return $table;
    }
}