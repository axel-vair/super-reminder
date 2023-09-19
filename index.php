<?php

require 'vendor/autoload.php';
use Reminder\Models\Helpers\Database;

$db = new Database();

$users = $db->query('SELECT * FROM user');
var_dump($users);
echo "hello";
?>