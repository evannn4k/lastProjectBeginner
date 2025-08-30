<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "../../../system/action.php";
    useQuery("/admin/seller");

    if(!empty($_POST["password"])) {
        $password = hash("sha256", $_POST["password"]);
    } else {
        $password = Seller::findById()->fetch()["password"];
    }
    
    Seller::update($password);
    redirect("/admin/seller", "success", "Berhasil mengedit data penjual!");
}
