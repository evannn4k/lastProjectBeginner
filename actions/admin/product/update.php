<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "../../../system/action.php";
    useQuery("/admin/product");

    $product = Product::findById($_GET["id"])->fetch();

    $category_id = (isset($_POST["category_id"])) ? $_POST["category_id"] : $product["category_id"];

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {
        $imageNameDefault = $product["image"];

        unlink(storage_path("/images/{$imageNameDefault}"));

        $file = $_FILES["image"];

        $fileName = $file["name"];
        $extention = pathinfo($fileName, PATHINFO_EXTENSION);
        $imageName = $product["id"] . "." . $extention;

        $tmp = $file["tmp_name"];
        $dir = storage_path("/images/");

        move_uploaded_file($tmp, $dir . $imageName);

        Product::update($_GET["id"], $category_id, $imageName);

    } else {
        $imageName = $product["image"];

        Product::update($_GET["id"], $category_id, $imageName);
    }

    redirect("/admin/product", "success", "Berhasil edit data produk!");
}
