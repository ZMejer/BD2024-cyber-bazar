<?php
    $category = $_POST['category'];
    $referer = $_SERVER['HTTP_REFERER'];
    $url = strtok($referer, '?');
    header("Location: $url?category=$category");
?>