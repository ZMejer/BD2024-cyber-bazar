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
<div class='container'>
<h1>Moje zamówienia</h1>
<div class='d-flex flex-wrap'>
<?php
    include 'connection.php';
    $conn = connection();
    session_start();
    $idu = $_SESSION['idu'];
    $orders_query = "SELECT * from zamowienia JOIN produkty ON idp=p_id WHERE u_id=".$idu." ORDER BY data DESC";
    $result = mysqli_query($conn, $orders_query); 

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="card w-25 mb-3 me-3">
            <div class="card-body">
                <h5 class="card-title">'.$row['data'].'</h5>
                <p class="card-text">'.$row['nazwa'].'</p>';
                if($row['data'] == date("Y-m-d")){
                    echo '<form method="POST" action="./cancel_order.php">
                    <input type="hidden" name="cancel_order" value='.$row['idz'].'>
                    <button type="submit" class="btn btn-outline-danger">Anuluj</button>
                    </form>';
                }
            echo '</div>
            </div>';
        }
    }

?>
</div>
</div>
</body>
</html>