<?php

session_start();
include 'connection.php';
$conn = connection();

$user_name = $_POST['user_name'];
$user_id = $_POST['user_id'];

$query = "UPDATE uzytkownicy SET imie = '".$user_name."' WHERE idu=".$user_id;
$_SESSION['imie'] = $user_name;

$referer = $_SERVER['HTTP_REFERER'];
$url = strtok($referer, '?');

$result = mysqli_query($conn, $query);
header("Location: $url");
?>