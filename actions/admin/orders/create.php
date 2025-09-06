<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "../../../system/action.php";
    useQuery("/admin/seller");
    useQuery("/admin/product");
    useQuery("/admin/orders");
    useQuery("/admin/order-product");

    $products = $_POST["products"];
    $admin = Seller::findByEmail($_POST["admin_email"])->fetch();
    $overQty = false;

    foreach ($products as $product) {
        $productDetail =  Product::findById($product["product_id"])->fetch();
        if ($productDetail["stock"] < $product["quantity"]) {
            $overQty = true;
        }
    }
    
    if ($overQty == false) {
        $total_payment = 0;
        $total_product = count($products);
        
        foreach ($products as $product) {
            $productDetail =  Product::findById($product["product_id"])->fetch();
            $total_price = $productDetail["price"] * $product["quantity"];
            $total_payment += $total_price;
        }

        Orders::create($admin["id"], $_POST["costumer_id"], $total_payment, $total_product);

        $lastId = DB->lastInsertId();

        $prepare = OrderProduct::prepareCreate();


        foreach ($products as $product) {
            $productDetail =  Product::findById($product["product_id"])->fetch();
            $totalPrice = $productDetail["price"] * $product["quantity"];

            OrderProduct::executeCreate($prepare, $lastId, $product["product_id"], $product["quantity"], $totalPrice);

            $stock = $productDetail["stock"] - $product["quantity"];
            Product::stockUpdate($product["product_id"], $stock);
        }
    } else {
        redirect("/admin/create-order", "error", "Jumlah barang yang dipesan melebihi stok!");
    }
    
    redirect("/admin/create-order", "success", "Pesanan berhasil dibuat!");
}
