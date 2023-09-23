<?php
require 'vendor/autoload.php';
use Reminder\Models\User;
session_start();
$deconnection = new User();
$deconnection->logout();