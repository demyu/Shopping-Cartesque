<?php


$servername = "localhost";
$username = "demyu";
$password = "123456789";
$dbname = "cart";

$conn = new mysqli($servername, $username, $password, $dbname);

  
$id = $_POST['data'];


$sql = "Delete from cart where id = '$id'";
$conn->query($sql);

$filegetter = file_get_contents("items.json");
$array = json_decode($filegetter, true);

$sql = "Select * from cart";
$result = $conn->query($sql);
$total = 0;

while ($row = $result->fetch_assoc()) {
    $base = $array[$row['id']]["price"] * $row['count'];
    $total += $base;
}

echo $total;
?>