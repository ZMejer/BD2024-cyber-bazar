<?php
include 'connection.php';
$conn = connection();

$store_id = $_POST['store_id'];
$product_id = $_POST['product_id'];
$product_count = $_POST['product_count'];

$referer = $_SERVER['HTTP_REFERER'];
$url = strtok($referer, '?');

if ($product_count>0) {
    $query = "UPDATE sklepy_produkty SET ilosc = '$product_count' WHERE p_id = '$product_id' AND s_id = '$store_id'";
    $result = mysqli_query($conn, $query);
    header("Location: $url?alter_stock=update");
}
else if($product_count==0) {
    $query = "DELETE FROM sklepy_produkty WHERE p_id = '$product_id' AND s_id = '$store_id'";
    $result = mysqli_query($conn, $query);
    header("Location: $url?alter_stock=delete");
}
else {
    header("Location: $url?alter_stock=value_error");
}
?>