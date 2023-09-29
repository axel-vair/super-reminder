<?php
namespace Reminder\Models;

require 'vendor/autoload.php';

if (isset($_POST) && !empty($_POST['email-login']) && !empty($_POST['password-login'])) {
    $new_user = new User();
    $new_user->verifUser($_POST['email-login']);
    die();
}
?>


<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/login.css">
    <link rel="stylesheet" href="./assets/index.css">
    <script src="src/login.js" defer></script>
    <title>Todolist</title>
</head>
<body>
<?php require "./partials/headerLog.php"; ?>
    <div class="main-form">
        <div class="signin">
            <h1>Connexion</h1>
            <form id="form-connection" method="post">

                <span id="error-container-login"></span>
                <label for="email-login">Email</label>
                <span id="email-error-login"></span>
                <input id="email-login" name="email-login" type="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" minlength="4"
                    maxlength="60" required>

                <label for="password-login">Mot de passe</label>
                <span id="password-error-login"></span>
                <input id="password-login" name="password-login" minlength="8" maxlength="100" type="password" required>
                <div class="button-pos"></div>
                <button type="submit" id="connexion" name="connexion">Se connecter</button>
        </div>
        </form>
    </div>
    </div>
</body>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>