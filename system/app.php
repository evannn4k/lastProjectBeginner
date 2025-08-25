<?php
session_start();
require __DIR__ . "/config.php";

function url($url)
{
    return BASE_URL . $url;
}
function middleware()
{
    $view = @$_GET["view"] ?: "";

    $isLogin = @$_SESSION["email"] ?: "";

    if ($isLogin && $view == '/login') {
        redirect("/admin/index");
    }
    if (!$isLogin && $view != '/login') {
        redirect("/login");
    }

    return $view;
}

function redirectTo($path) {
    $url = url("/index.php?view=$path");
    return $url;    
}

function redirect($path)
{
    $url = url("/index.php?view=" . $path);
    header("Location:$url");
}

function render($view)
{
    $basepage = "pages";
    @include "$basepage/$view.php";

    if ($view == "/login") {
        @include "$basepage/auth/login.php";
    }
}

function action($url)
{
    return url("/actions$url.php");
}

function asset($path) {
    return url("/assets$path");
}

function storage_path($path) {
    return __DIR__ . "/../storage$path";
}

function storage($path) {
    return "storage$path";
}

function connection()
{
    try {
        $hostname = DB_HOSTNAME;
        $username = DB_USERNAME;
        $password = DB_PASSWORD;
        $dbname = DB_NAME;
        $database = new PDO("mysql:host={$hostname};dbname={$dbname}", $username, $password);

        define("DB", $database);
        
    } catch (\Exception $e) {
        die("Error" . $e->getMessage());
    }
}

connection();
