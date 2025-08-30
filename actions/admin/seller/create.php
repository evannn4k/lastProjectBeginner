<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "../../../system/action.php";
    useQuery("/admin/seller");

    $password = hash("sha256", $_POST["password"]);
    Seller::create($password);
    redirect("/admin/seller", "success", "Berhasil menambahkan data penjual!");
}
