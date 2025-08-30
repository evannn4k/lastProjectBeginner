<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    require "../../../system/action.php";
    useQuery("admin/costumer");
    
    Costumer::create();
    redirect("/admin/costumer", "success", "Berhasil menambah data pembeli!");
}