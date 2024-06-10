<?php

include 'connection.php';
$conn = connection();

$password = $_POST['password'];
$user_id = $_POST['user_id'];

$query = "UPDATE uzytkownicy SET haslo = '".$password."' WHERE idu=".$user_id;

$referer = $_SERVER['HTTP_REFERER'];
$url = strtok($referer, '?');

$result = mysqli_query($conn, $query);
header("Location: $url?password=changed");
?>