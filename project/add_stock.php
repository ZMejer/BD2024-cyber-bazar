<?php
include 'connection.php';
$conn = connection();

$store = $_POST['store_id'];
$product = $_POST['product_id'];
$count = $_POST['product_count'];

$referer = $_SERVER['HTTP_REFERER'];
$url = strtok($referer, '?');

if($count<=0){
    header("Location: $url?alter_stock=value_error");
} else {
    $sql = "INSERT INTO sklepy_produkty(p_id, s_id, ilosc) VALUES('$product', '$store', '$count')";
    mysqli_query($conn, $sql);
    header("Location: $url");
}

?>