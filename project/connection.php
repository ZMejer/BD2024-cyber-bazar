<?php
function connection()
{
    $conn = mysqli_connect("localhost", "root", "", "cyber_bazar");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        return $conn;
    }
}

?>