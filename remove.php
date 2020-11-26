<?php


$servername = "localhost";
$username = "demyu";
$password = "123456789";
$dbname = "cart";

$conn = new mysqli($servername, $username, $password, $dbname);

  
$id = $_POST['data'];

$sql = "Delete from cart where id = '$id'";

$conn->query($sql);

?>