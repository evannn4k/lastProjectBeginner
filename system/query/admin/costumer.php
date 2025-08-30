<?php

class Costumer {

    public static function countCostumers()
    {
        return DB->query("SELECT COUNT(id) as total FROM `costumers`");
    }

    public static function countMale()
    {
        return DB->query("SELECT COUNT(id) as total FROM `costumers` WHERE gender = 'Laki-laki'");
    }

    public static function countFemale()
    {
        return DB->query("SELECT COUNT(id) as total FROM `costumers` WHERE gender = 'Perempuan'");
    }

    public static function findById($id)
    {
        return DB->query("SELECT * FROM `costumers` WHERE `id` = $id");
    }

    public static function findAll()
    {
        return DB->query("SELECT c.id as id, c.name as name, c.email as email, c.gender as gender, c.created_at as created_at, SUM(o.total_payment) as total_payment, COUNT(o.id) as total_order FROM costumers c LEFT JOIN orders o ON o.costumer_id = c.id GROUP BY c.id, c.name, c.email, c.gender, c.created_at");
    }

    public static function search()
    {
        $query = DB->prepare("SELECT * FROM `costumers` WHERE name LIKE :name");
        $query->execute([
            "name" => "%" . $_POST["search"] . "%"
        ]);

        return $query;
    }

    public static function create()
    {
        $query = DB->prepare("INSERT INTO `costumers` (name, email, gender) VALUES (:name, :email, :gender)");
        $query->execute([
            "name" => $_POST["name"],
            "email" => $_POST["email"],
            "gender" => $_POST["gender"]
        ]);
    }

    public static function update()
    {
        $query = DB->prepare("UPDATE `costumers` SET name = :name, email = :email, gender = :gender WHERE id = :id");
        $query->execute([
            "id" => $_POST["id"],
            "name" => $_POST["name"],
            "email" => $_POST["email"],
            "gender" => $_POST["gender"],
        ]);
    }

    public static function delete()
    {
        $query = DB->prepare("DELETE FROM `costumers` WHERE id = :id");
        $query->execute([
            "id" => $_GET["id"]
        ]);
    }
}
