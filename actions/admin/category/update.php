<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    require "../../../system/action.php";
    useQuery("admin/category");

    Category::update();
    redirect("/admin/category");
}