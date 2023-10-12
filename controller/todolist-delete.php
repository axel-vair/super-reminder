<?php
// Page to update a todo
session_start();
require_once "../models/Todo.php";
$delete = new Todo();
$delete->deleteTodo($_GET['delete-todo']);