<?php
include 'connection.php';
$conn = connection();

$user = $_POST['user_id'];

$query = "DELETE FROM uzytkownicy WHERE idu=".$user;

$referer = $_SERVER['HTTP_REFERER'];
$url = strtok($referer, '?');

$result = mysqli_query($conn, $query);
header("Location: $url");
?>