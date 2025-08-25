<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    require "../../../system/action.php";
    useQuery("/admin/product");
    $lastId = Product::lastId()->fetch() ?? 0 ;

    $file = $_FILES["image"];

    $fileName = $file["name"];
    $extention = pathinfo($fileName, PATHINFO_EXTENSION);
    $imageName = $lastId["id"] + 1 .".".$extention;

    $tmp = $file["tmp_name"];
    $dir = storage_path("/images/");

    Product::create($imageName);
    move_uploaded_file($tmp, $dir.$imageName);

    redirect("/admin/product");
}