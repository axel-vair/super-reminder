<?php

use Reminder\Models\Helpers\Database;

require 'vendor/autoload.php';


$db = new Database();
$users = $db->query('SELECT * FROM user');
var_dump($users);
echo "hello";
?>