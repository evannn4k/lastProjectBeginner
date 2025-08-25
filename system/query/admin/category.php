<?php

class Category {

    public static function countCategories()
    {
        return DB->query("SELECT COUNT(id) as total FROM `categories`");
    }

    public static function findAll()
    {
        return DB->query("SELECT * FROM `categories`");
    }

    public static function search()
    {
        $query = DB->prepare("SELECT * FROM `categories` WHERE name LIKE :name");
        $query->execute([
            "name" => "%" . $_POST["search"] . "%"
        ]);

        return $query;
    }

    public static function create()
    {
        $query = DB->prepare("INSERT INTO `categories` (name) VALUES (:name)");
        $query->execute([
            "name" => $_POST["name"]
        ]);
    }

    public static function update()
    {
        $query = DB->prepare("UPDATE `categories` SET name = :name WHERE id = :id");
        $query->execute([
            "id" => $_POST["id"],
            "name" => $_POST["name"]
        ]);
    }

    public static function delete()
    {
        $query = DB->prepare("DELETE FROM `categories` WHERE id = :id");
        $query->execute([
            "id" => $_GET["id"]
        ]);
    }
}
