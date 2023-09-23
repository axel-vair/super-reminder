<?php
// Page to display all. This page is called by the ajax request in todolist.
require "../vendor/autoload.php";
session_start();

use Reminder\Models\Todo;

    $todo = new Todo();
    echo $todo->displayTodo($_SESSION['id']);