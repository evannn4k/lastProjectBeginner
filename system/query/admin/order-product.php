<?php

class OrderProduct
{
    public static function findById($id) {
        $query = DB->prepare("SELECT os.id, c.name, os.created_at, op.quantity, p.name as product, op.total_price, os.total_payment, op.quantity FROM `orders` os JOIN order_products op ON op.order_id = os.id JOIN costumers c ON c.id = os.costumer_id JOIN products p ON p.id = op.product_id WHERE os.id = :id");
        $query->execute(["id" => $id]);

        return $query;
    }

    public static function prepareCreate()
    {
        return DB->prepare("INSERT INTO `order_products` (order_id, product_id, quantity, total_price) VALUES (:orderId, :productId, :quantity, :totalPrice)");
    }

    public static function executeCreate($prepare, $orderId, $productId, $quantity, $totalPrice)
    {
        $prepare->execute([
            "orderId" => $orderId,
            "productId" => $productId,
            "quantity" => $quantity,
            "totalPrice" => $totalPrice
        ]);
    }
}
