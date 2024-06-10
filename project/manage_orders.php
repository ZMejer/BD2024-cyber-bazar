<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Bazar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
</head>
<body>
<?php
include 'navbar.php';
navbar();
?>
<div class="container">
<h1>Zarządzanie zamówieniami</h1>
<div class='d-flex flex-wrap'>
<?php
session_start();
if($_SESSION['rola']=='klient' || !isset($_SESSION['rola'])){
    echo '<div class="alert alert-danger" role="alert">
    Brak uprawnień do zarządzania zamówieniami.
    </div>';
} else {
    include 'connection.php';
    $conn = connection();
    $orders_query = "SELECT * from zamowienia LEFT JOIN produkty ON idp=p_id LEFT JOIN uzytkownicy ON idu=u_id ORDER BY data DESC";
    $result = mysqli_query($conn, $orders_query); 

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo'
            <div class="card w-25 mb-3 me-3">
            <div class="card-body">
                <h5 class="card-title">'.$row['data'].'</h5>';

                if(is_null($row['nazwa'])){
                    echo'<p class="card-text">Produkt: usunięty</p>';
                } else {
                    echo'<p class="card-text">Produkt: '.$row['nazwa'].'</p>';
                }
                

                echo'<form method="POST" action="./alter_order.php">
                <input type="hidden" name="order_id" value='.$row['idz'].'>
                <label>Zmień produkt: </label>
                <select class="form-control" name="product">';
                $products_query = 'SELECT DISTINCT nazwa, idp FROM produkty';
                $result1 = mysqli_query($conn, $products_query); 
                if ($result1) {
                    while ($row2 = mysqli_fetch_assoc($result1)) {
                        echo '<option value='.$row2['idp'].'>'.$row2['nazwa'].'</option>';
                    }
                }
                echo'
                </select>
                <button type="submit" class="btn btn-outline-primary mt-1 mb-4">Potwierdź zmianę</button>
                </form>';
                if (is_null($row['imie'])){
                    echo'
                    <p class="card-text">Użytkownik: usunięty</p>';
                } else {
                    echo'
                    <p class="card-text">Użytkownik: '.$row['imie'].' '.$row['nazwisko'].'</p>';
                }
                
                    echo '<form method="POST" action="./cancel_order.php">
                    <input type="hidden" name="cancel_order" value='.$row['idz'].'>
                    <button type="submit" class="btn btn-outline-danger">Usuń zamówienie</button>
                    </form>';
            echo '</div>
            </div>';
        }
    }
}
?>
</div>
</div>
</body>
</html>