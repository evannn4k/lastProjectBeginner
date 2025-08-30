<?php

class Seller {
    public static function findById() {
        $query =  DB->prepare("SELECT * FROM `admins` WHERE id = :id");
        $query->execute([
            "id" => $_POST["id"]
        ]);
        return $query;
    }

    public static function findByEmail($email) {
        $query =  DB->prepare("SELECT * FROM `admins` WHERE email = :email");
        $query->execute([
            "email" => $email
        ]);
        return $query;
    }

    public static function findAll()
    {
        return DB->query("SELECT * FROM `admins`");
    }

    public static function search()
    {
        $query = DB->prepare("SELECT * FROM `admins` WHERE email LIKE :email");
        $query->execute([
            "email" => "%" . $_POST["search"] . "%"
        ]);

        return $query;
    }

    public static function create($password)
    {
        $query = DB->prepare("INSERT INTO `admins` (email, password) VALUES (:email, :password)");
        $query->execute([
            "email" => $_POST["email"],
            "password" => $password
        ]);
    }
    
    public static function update($password)
    {
        $query = DB->prepare("UPDATE `admins` SET email = :email, password = :password WHERE id = :id");
        $query->execute([
            "id" => $_POST["id"],
            "email" => $_POST["email"],
            "password" => $password
        ]);
    }

    public static function delete()
    {
        $query = DB->prepare("DELETE FROM `admins` WHERE id = :id");
        $query->execute([
            "id" => $_GET["id"]
        ]);
    }
}