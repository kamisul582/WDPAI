<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Company.php';

class CompaniesRepository extends Repository
{

    public function getCompanyInfo(int $company_id): array
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

    public function getCompany(string $email)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.companies WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new Company(
            $user['company_id'],
            $user['email'],
            $user['password'],
            $user['company_name'],
            $user['company_address']
        );
    }

    public function addCompany(Company $company)
    {
        
        $sql ='INSERT INTO public.companies (email, password, company_name, company_address) VALUES (?, ?, ?, ?)';
        $stmt = $this->database->connect()->prepare($sql);

        $stmt->execute([
            $company->getEmail(),
            $company->getPassword(),
            $company->getCompanyName(),
            $company->getCompanyAddress(),
        ]);
    }
}