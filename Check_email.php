<?php

require_once "./models/Connect.php";

$email = $_POST['email'];

$conn = new Connect;

if ($conn->emailExist($email) > 0) {
    echo 'exists';
} else {
    echo 'not_exists';
}

$conn->closeStmt();
$conn->closeDb();
?>