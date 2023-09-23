<?php
// Page to update a todo
session_start();
require "../vendor/autoload.php";
use Reminder\Models\Todo;
$delete = new Todo();
$delete->deleteTodo($_GET['delete']);