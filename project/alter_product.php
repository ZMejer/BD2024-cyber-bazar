<?php
include 'connection.php';
$conn = connection();

$product_id = $_POST['product_id'];
$price = $_POST['price'];

$referer = $_SERVER['HTTP_REFERER'];
$url = strtok($referer, '?');

if($price<=0){
    header("Location: $url?error=value_error");
} else {
    $query = "UPDATE produkty SET cena = ".$price." WHERE idp=".$product_id;
    $result = mysqli_query($conn, $query);
    header("Location: $url");
}
?>