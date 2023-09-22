<?php

require 'vendor/autoload.php';
use Reminder\Models\Todo;
require_once "partials/header.php";

if($_SESSION){
    if(isset($_POST)){
        $user_id = $_SESSION['id'];
        $title = $_POST['input_title_todo'];
        $task = $_POST['input_todo'];
        $todo = new Todo();
        $todo->todoInsert($user_id, $title, $task);
    }else{
        header('Location: login.php');
    }
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="src/todolist.js" defer></script>
    <title>Todolist</title>
</head>
<body>
    <div id="title-div">
        <h1>Liste de <?= $_SESSION['firstName'] . ' ' . $_SESSION['lastName'] ?></h1>
    </div>

    <div id="container-todo">
        <section id="container-form">
            <span id="error"></span>
            <form method="post" id="todo-form">
                <label id="label_title_todo" for="input_title_todo">Titre :</label>
                <input id="input_title_todo" name="input_title_todo" type="text" required>

                <label id="label_todo" for="input_todo">Tâches à réaliser :</label>
                <input id="input_todo" name="input_todo" type="text" required>

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
</body>
</html>