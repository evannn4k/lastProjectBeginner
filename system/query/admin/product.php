<?php

class Product
{
    public static function stock()
    {
        return DB->query("SELECT * FROM `products` WHERE stock > 0");
    }

    public static function searchStock()
    {
        $query = DB->prepare("SELECT * FROM `products` WHERE name LIKE :name AND stock > 0");
        $query->execute([
            "name" => "%" . $_POST["search"] . "%"
        ]);

        return $query;
    }

    public static function lastId()
    {
        return DB->query(query: "SELECT id FROM `products` ORDER BY id DESC LIMIT 1");
    }

    public static function findAll()
    {
        return DB->query("SELECT * FROM `products`");
    }

    public static function findById($id)
    {
        $query = DB->prepare("SELECT * FROM `products` WHERE id = :id");
        $query->execute([
            "id" => $id
        ]);
        return $query;
    }

    public static function search()
    {
        $query = DB->prepare("SELECT * FROM `products` WHERE name LIKE :name");
        $query->execute([
            "name" => "%" . $_POST["search"] . "%"
        ]);

        return $query;
    }

    public static function create($imageName = null)
    {
        $query = DB->prepare("INSERT INTO `products` (name, category_id, price, stock, image) VALUES (:name, :category_id, :price, :stock, :imageName)");
        $query->execute([
            "name" => $_POST["name"],
            "category_id" => $_POST["category_id"],
            "price" => $_POST["price"],
            "stock" => $_POST["stock"],
            "imageName" => $imageName
        ]);
    }

    public static function stockUpdate($id, $stock)
    {
        $query = DB->prepare("UPDATE `products` SET stock=:stock WHERE id = $id");
        $query->execute([
            "stock" => $stock
        ]);
    }

    public static function update($id, $category_id = null, $imageName = null)
    {
        $query = DB->prepare("UPDATE `products` SET name=:name, category_id=:category_id, price=:price, stock=:stock, image=:image WHERE id = $id");
        $query->execute([
            "name" => $_POST["name"],
            "category_id" => $category_id,
            "price" => $_POST["price"],
            "stock" => $_POST["stock"],
            "image" => $imageName
        ]);
    }

    public static function delete()
    {
        $query = DB->prepare("DELETE FROM `products` WHERE id = :id");
        $query->execute([
            "id" => $_GET["id"]
        ]);
    }

    public static function restock($id)
    {
        $query = DB->prepare("UPDATE `products` SET stock = :stock WHERE id = $id");
        $query->execute([
            "stock" => $_POST["stock"]
        ]);
    }
}
