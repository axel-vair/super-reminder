<?php
session_start();
require "../vendor/autoload.php";
use Reminder\Models\Todo;
$new_todo = new Todo();
$title = $_POST['input_title_todo'];
$task = $_POST['input_todo'];
echo $new_todo->todoInsert($_SESSION['id'],$title, $task);
