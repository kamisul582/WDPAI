<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getAllUsers(string $email)
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM public.users');
        #$stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($users == false) {
            return null;
        }
        foreach ($users as $user){
        $myUser = new User(
            $user['user_id'],
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['employer_id'],
            $user['kiosk_code']
    
        );
        $this->setKioskCode($user['user_id']);
        }
        $stmt->execute();
    
        $result = $stmt->fetchColumn();
    
    }
    public function setKioskCode(int $user_id){
        $sql = "UPDATE public.users SET kiosk_code = unique_random(8, 'users', 'kiosk_code') WHERE user_id = :user_id;";
            $stmt = $this->database->connect()->prepare($sql);   
            $stmt->execute(array('user_id' => $user_id));
    }
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['user_id'],
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['employer_id'],
            $user['kiosk_code']
        );
    }

    public function addUser(User $user)
    {
        
        $sql ='INSERT INTO public.users (email, password, name, surname, employer_id, kiosk_code) VALUES (?, ?, ?, ?, ?, ?)';
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