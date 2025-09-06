<?php

class Orders
{
    public static function totalPayment()
    {
        return DB->query("SELECT SUM(total_payment) as total_payment FROM `orders`");
    }

    public static function totalOrder()
    {
        return DB->query("SELECT COUNT(id) as total_order FROM `orders`");
    }

    public static function order1Mounth()
    {
        return DB->query("SELECT COUNT(id) as total FROM `orders` WHERE created_at > LAST_DAY(NOW() - INTERVAL 1 MONTH)");
    }

    public static function totalPayment1Mounth()
    {
        return DB->query("SELECT SUM(total_payment) as total_payment FROM `orders` WHERE created_at > LAST_DAY(NOW() - INTERVAL 1 MONTH)");
    }

    public static function findAll()
    {
        return DB->query("SELECT
        o.id as id,
        c.name as name,
        a.email as admin_email,
        o.total_payment as total_payment,
        o.total_product as total_product,
        o.created_at as created_at
        FROM orders o
        JOIN admins a ON a.id = o.admin_id
        JOIN costumers c ON c.id = o.costumer_id
        ORDER BY o.id ASC
        ");
    }

    public static function create($admin_id, $costumer_id, $total_payment, $total_product)
    {
        $query = DB->prepare("INSERT INTO `orders` (admin_id, costumer_id, total_payment, total_product) VALUES (:admin_id, :costumer_id, :total_payment, :total_product)");
        $query->execute([
            "admin_id" => $admin_id,
            "costumer_id" => $costumer_id,
            "total_payment" => $total_payment,
            "total_product" => $total_product
        ]);
    }
}
