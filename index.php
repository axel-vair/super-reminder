<?php
namespace Reminder\Models;
use Reminder\Models\Helpers\Database;

require 'vendor/autoload.php';

if(isset($_POST) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])){
    $new_user = new User();
    $new_user->register($_POST['email'], $_POST['password'], $_POST['firstname'], $_POST['lastname']);
}


?>
<h1>Inscription</h1>
<form id="form-register" method="post">

    <label for="email">Email</label>
    <input id="email" name="email" type="text" required>

    <label for="lastname">Nom</label>
    <input id="lastname" name="lastname" type="text" required>

    <label for="firstname">Prénom</label>
    <input id="firstname" name="firstname" type="text" required>

    <label for="password">Mot de passe</label>
    <input id="password" name="password" type="password" required>

    <button type="submit"  id="envoie" name="envoie">S'inscrire</button>
</form>
