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
            <header class="profil-header"><span id="profil-list"><ion-icon id="list-open" name="list-outline"
                        alt="list-outline"></ion-icon></span></header>
            <div class="user">
                <span id="user-picture"><ion-icon name="person-outline"></ion-icon></span>
                <span id="user-name">
                    <ul>
                        <li>
                            <?= $_SESSION['firstName'] ?>
                        </li>
                        <li>
                            <?= $_SESSION['lastName'] ?>
                        </li>
                    </ul>
                </span>
            </div>
            <div class="user-info">
                <input id="search-todo" type="text" name="search" placeholder="Rechercher">
                <span id="status"><span id="status-icon"><ion-icon name="people-outline"></ion-icon></span>status
                    :</span>
                <div class="todo-group">
                    <h3 id="todo-group">Groupe tache : </h3>
                    <div id="one-group"><span>créer un groupe</span></div>
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
        <header class="profil-header"><span id="profil-list"><ion-icon id="list-open" name="list-outline"
                    alt="list-outline"></ion-icon></span></header>
        <div class="todo">
            <div class="title-pos">
                <h2>A faire :</h2>
            </div>
            <section class="todo-div-container">

                <ul id="list-todo">
                    <!-- AJOUTER STYLE ET CREATE ELEMENT JS-->
                </ul>

            </section>
            <div class="title-pos">
                <h2>Tâches terminées :</h2>
            </div>

            <section class="done-div-container">

                <ul id="done">
                    <!-- AJOUTER STYLE ET CREATE ELEMENT JS-->
                </ul>
            </section>
            <section id="container-form">
                <span id="error"></span>
                <form method="post" id="todo-form">
                    <input id="input_title_todo" name="input_title_todo" placeholder="Ajouter un titre" type="text"
                        required>
                    <input id="input_todo" name="input_todo" placeholder="Tâches à réaliser" type="text" required>
                    <button id="submit" type="submit"><ion-icon name="add-sharp"></ion-icon></button>
                </form>
            </section>
        </div>
    </main>
</body>
<script src="./super-reminder/src/script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>