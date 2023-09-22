<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/index.css">
    <title>Todolist</title>
</head>
<body>
<?php
require_once "partials/header.php";
?>
<section class="container">
    <main class="section-logo">
        <div class="home-logo">
            <span id="logo"><ion-icon name="list-outline"></ion-icon></span>
            <span id="logo-title"><h1>todo</h1></span>
        </div>
    </main>
    <div class="form-btn">
        <button id="sign-up" onclick="window.location.href='register.php'">sign <span id="form-btn-clr">up</span></button>
        <button id="sign-in" onclick="window.location.href='login.php'">sign <span id="form-btn-clr">in</span></button>
    </div>
</section>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>