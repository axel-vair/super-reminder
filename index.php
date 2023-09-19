<?php
namespace Reminder\Models;
use Reminder\Models\Helpers\Database;

require 'vendor/autoload.php';

if(isset($_POST) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])){
    $new_user = new User();
    $new_user->register($_POST['email'], $_POST['password'], $_POST['firstname'], $_POST['lastname']);
}


?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="src/register.js" defer></script>
    <title>Todolist</title>
</head>
<body>

<h1>Inscription</h1>
<form id="form-register" method="post">

    <label for="email">Email</label>
    <span id="email-error"></span>
    <input id="email"
           name="email"
           type="email"
           minlength="5"
           maxlength="60"
           required>

    <label for="lastname">Nom</label>
    <span id="lastname-error"></span>
    <input id="lastname"
           name="lastname"
           minlength="2"
           maxlength="40"
           type="text"
           required>

    <label for="firstname">Prénom</label>
    <span id="firstname-error"></span>
    <input id="firstname"
           name="firstname"
           minlength="2"
           maxlength="40"
           type="text"
           required>

    <label for="password">Mot de passe</label>
    <span id="password-error"></span>
    <input id="password"
           name="password"
           minlength="8"
           maxlength="100"
           type="password"
           required>

    <button type="submit"  id="envoie" name="envoie">S'inscrire</button>
</form>

</body>
</html>
