<?php
include "../classes/user.php";
// collect form data
$username = $_POST["username"];
$password = $_POST["password"];

// create an object
$user = new User;
// call tha method
$user->login($username, $password);
?>