<?php

function auth() {
    $auth = DB->prepare("SELECT * FROM `admins` WHERE `email` = :email AND `password` = :password LIMIT 1");
    $auth->execute([
        "email" => $_POST["email"],
        "password" => hash("sha256", $_POST["password"])
    ]);

    if(!$auth->fetch()) {
        redirect("");
    } else {
        return true;
    }

}