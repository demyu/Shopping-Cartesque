<?php


$servername = "localhost";
$username = "demyu";
$password = "123456789";
$dbname = "cart";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "Delete from cart";
$conn->query($sql);

?>