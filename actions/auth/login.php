<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    require "../../system/action.php";
    useQuery(path: "auth/login");

    $role = auth();
    if($role) {
        $_SESSION["email"] = $_POST["email"];
        redirect("/admin/index");
    } else {
        $_GET["view"] = "login";
    }
}