<?php
include 'connection.php';
$conn = connection();

$name = $_POST['product_name'];
$price = $_POST['price'];
$category = $_POST['category'];

$referer = $_SERVER['HTTP_REFERER'];
$url = strtok($referer, '?');

if($price<=0){
    header("Location: $url?error=value_error");
} else {
    $query = "UPDATE produkty SET cena = ".$price." WHERE idp=".$product_id;
    $sql = "INSERT INTO produkty(nazwa,cena,kategoria) VALUES('$name', '$price', '$category')";
    mysqli_query($conn, $sql);
    header("Location: $url");
}

?>