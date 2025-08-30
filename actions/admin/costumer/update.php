<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    require "../../../system/action.php";
    useQuery("admin/costumer");

    Costumer::update();
    redirect("/admin/costumer", "success", "Berhasil mengedit data pembeli!");
}