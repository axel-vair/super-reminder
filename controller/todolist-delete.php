<?php
require "../vendor/autoload.php";
use Reminder\Models\Todo;
$delete = new Todo();
$delete->deleteTodo($_GET['delete']);