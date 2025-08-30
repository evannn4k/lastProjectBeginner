<?php
include "system/app.php";
$view = middleware();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poin Of Seles</title>

    <!-- tailwind -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">

    <style>
        body {
            font-family: "poppins", sans-serif;
        }
    </style>
</head>

<body>
    <?php render($view) ?>


    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php
        if (isset($_SESSION["success"])) :
        ?>
            Swal.fire({
                title: "Success",
                text: <?= json_encode($_SESSION["success"]) ?>,
                icon: "success",
                draggable: true
            });

        <?php
            unset($_SESSION["success"]);
        endif;
        ?>

        <?php
        if (isset($_SESSION["error"])) :
        ?>
            Swal.fire({
                title: "Error",
                text: <?= json_encode($_SESSION["error"]) ?>,
                icon: "error",
                draggable: true
            });

        <?php
            unset($_SESSION["error"]);
        endif;
        ?>
    </script>
</body>

</html>