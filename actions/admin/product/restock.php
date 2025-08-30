<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    require "../../../system/action.php";
    useQuery("/admin/product");

    Product::restock($_GET["id"]);
    redirect("/admin/product", "success", "Berhasil restock!");
}