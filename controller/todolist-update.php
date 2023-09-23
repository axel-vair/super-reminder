<?php
// Page to update a todo
session_start();
require "../vendor/autoload.php";
use Reminder\Models\Todo;
$update = new Todo();
@$update->updateTodo($_GET['update']);
