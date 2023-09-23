<?php
require "../vendor/autoload.php";
use Reminder\Models\Todo;
$update = new Todo();
@$update->updateTodo($_GET['update']);
