<?php
include 'connection.php';

    $conn = connection();
    $login = $_POST['login'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM uzytkownicy WHERE login = '$login' AND haslo = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $referer = $_SERVER['HTTP_REFERER'];
    $url = strtok($referer, '?');

    if (mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['idu'] = $row['idu'];
        $_SESSION['imie'] = $row['imie'];
        $_SESSION['nazwisko'] = $row['nazwisko'];
        $_SESSION['adres'] = $row['adres'];
        $_SESSION['miasto'] = $row['miasto'];
        $_SESSION['rola'] = $row['rola'];
        $_SESSION['login'] = $row['login'];
        $_SESSION['telefon'] = $row['telefon'];
        header("Location: $url?login=valid");
    } else {
        header("Location: $url?login=invalid");
    }

?>
