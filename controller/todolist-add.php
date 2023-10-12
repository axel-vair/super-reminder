<?php
// Page to add a new todo
session_start();
require_once "../models/Todo.php";
$new_todo = new Todo();
$title = $_POST['input_title_todo'];
$task = $_POST['input_todo'];
echo $new_todo->todoInsert($_SESSION['id'],$title, $task);
