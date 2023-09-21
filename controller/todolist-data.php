<?php
require "../vendor/autoload.php";
session_start();
use Reminder\Models\Todo;

    $todo = new Todo();
    echo $todo->displayTodo();