<?php

require "../../../system/action.php";
useQuery("/admin/product");

$product = Product::findById($_GET["id"])->fetch();
$image = $product["image"];

unlink(storage_path("/images/{$image}"));

Product::delete();
redirect("/admin/product");