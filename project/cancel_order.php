<?php
include 'connection.php';
$conn = connection();

$order = $_POST['cancel_order'];
$query = "DELETE FROM zamowienia WHERE idz=".$order;

$referer = $_SERVER['HTTP_REFERER'];
$url = strtok($referer, '?');

$result = mysqli_query($conn, $query);
header("Location: $url");
?>