<?php

$pdo = new PDO('mysql:dbname=shopbe;host=localhost', 'root', '');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$conn = new mysqli('localhost','root', '', 'shopbe');

    if ($conn->connect_error){
        echo $error -> $conn->connect_error;
    }

?>
