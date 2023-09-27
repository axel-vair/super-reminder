<?php
require 'vendor/autoload.php';
require_once "partials/header.php";
if(!$_SESSION){
    header('Location: login.php');
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./super-reminder/assets/board.css">
    <title>Todolist</title>
</head>
<body>
<aside class="profil-side">
    <div class="profil">
    <div class="user">
        <span id="user-picture"><ion-icon name="person-outline"></ion-icon></span>
    </div>
    <div class="user-info">
        <!--<span id="info">Liste de <?= $_SESSION['firstName'] . ' ' . $_SESSION['lastName'] ?></span>-->
        <ul>
            <input id="search-todo" type="text" name="search" placeholder="rechercher">
            <li>prénom</li>
            <li>nom</li>
            <li>statut</li>
        </ul>
        <div class="todo-group">groupe tache :
        </div>
    </div>
    <div class="logout-btn">
        <a role="button" id='btn-logout' href="logout.php">
            <span id="span-logout"><ion-icon name="log-out-outline"></ion-icon></span>
        </a>
    </div>
    </div>
</aside>
<main class="todo-list">
<header class="profil-header"><span id="profil-list"><ion-icon id="list-open" name="list-outline" alt="list-outline"></ion-icon></span></header>
    <div class="todo">
    <section id="container-form">
            <span id="error"></span>
            <form method="post" id="todo-form">
                <input id="input_title_todo" name="input_title_todo" placeholder="Ajouter un titre" type="text" required>
                <input id="input_todo" name="input_todo" placeholder="Tâches à réaliser" type="text" required>

                <button id="submit" type="submit">Ajouter</button>
            </form>
        </section>
        <section class="todo-div-container">
            <h2>A faire :</h2>
            <ul id="list-todo">

            </ul>

        </section>
        <section class="done-div-container">
            <h2>Tâches terminées :</h2>
            <ul id="done">
            </ul>
        </section>
        </div>
</main>
</body>
<script src="./super-reminder/src/script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>