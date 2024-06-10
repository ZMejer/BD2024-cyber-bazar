<?php
include 'connection.php';

    $conn = connection();

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];

    $referer = $_SERVER['HTTP_REFERER'];
    $url = strtok($referer, '?');

    $query = "SELECT login FROM uzytkownicy WHERE login = '$login'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        header("Location: $url?signup=invalid");
    }
    else {
        $sql = "INSERT INTO uzytkownicy(imie, nazwisko, adres, miasto, rola, haslo, login, telefon) VALUES ('$name', '$surname', '$address', '$city', 'klient', '$password', '$login', '$phone')";
        if (mysqli_query($conn, $sql)) {
            header("Location: $url?signup=valid");
        } 
    }

?>