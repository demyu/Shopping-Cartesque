<?php


$servername = "localhost";
$username = "demyu";
$password = "123456789";
$dbname = "cart";

$conn = new mysqli($servername, $username, $password, $dbname);

  
$id = $_POST['data'];
$numberitems = $_POST['numberitems'];

$filegetter = file_get_contents("items.json");
$array = json_decode($filegetter, true);

$itemName = $array[$id]["name"];


$sql = "Update cart set count = '$numberitems' where id = '$id'";
$conn->query($sql);

$sql = "Select * from cart";
$result = $conn->query($sql);
$total = 0;

while ($row = $result->fetch_assoc()) {
    $base = $array[$row['id']]["price"] * $row['count'];
    $total += $base;
}

echo $total;
?>