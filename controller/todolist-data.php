<?php
// Page to display all. This page is called by the ajax request in todolist.

session_start();
require_once "../models/Todo.php";
$todo = new Todo();
// echo json_encode('plop');
echo $todo->displayTodo($_SESSION['id']);