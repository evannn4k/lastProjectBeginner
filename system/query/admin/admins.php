<?php

class Admins {
    public static function findByEmail($email) {
        $query =  DB->prepare("SELECT * FROM `admins` WHERE email = :email");
        $query->execute([
            "email" => $email
        ]);
        return $query;
    }
}