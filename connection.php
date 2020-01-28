<?php
try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=ecommerce", $username, $password);
} catch (PDOException $e) {
    echo $e;
}
?>
