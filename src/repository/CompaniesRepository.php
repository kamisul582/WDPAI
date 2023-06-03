<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Company.php';

class CompaniesRepository extends Repository
{

    public function getCompany(int $company_id): array
    {
        $stmt = $this->database->connect()->prepare('
            SELECT company_name, company_address FROM public.companies WHERE company_id = :company_id');
        $stmt->bindParam(':company_id', $company_id, PDO::PARAM_STR);
        $stmt->execute();

        $table = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($table)) {
            return NULL;
        }
        #var_dump($table);
        return $table;
    }

    public function addCompany(User $user)
    {
        
        $sql ='INSERT INTO public.companies (email, password, name, surname, employer_id, kiosk_code) VALUES (?, ?, ?, ?, ?, ?)';
        $stmt = $this->database->connect()->prepare($sql);

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            $user->getName(),
            $user->getSurname(),
            $user->getEmployer_id(),
            $user->getKiosk_code(),
        ]);
    }
}