<?php
// Page to update a todo

session_start();
require_once "../models/Todo.php";
$update = new Todo();
$update->updateTodo($_GET['update'], date('Y-m-d H:i:s'));
