<?php


$servername = "localhost";
$username = "demyu";
$password = "123456789";
$dbname = "cart";

$conn = new mysqli($servername, $username, $password, $dbname);

  
$id = $_POST['data'];

$filegetter = file_get_contents("items.json");
$array = json_decode($filegetter, true);

$itemName = $array[$id]["name"];

if(!checkIfExist($id, $conn)){
    $sql = "Insert into cart values('$id', '$itemName', 1)";
    $conn->query($sql);
}

function checkIfExist($id, $conn){


    $sql = "Select * from cart where id = '$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $numberitems = $row['count'];
        $numberitems = $numberitems+1;

        $sql = "Update cart set count = '$numberitems' where id = '$id'";
        $result = $conn->query($sql);

        return true;
    }
    return false;
}

function console_log( $id ){
    echo '<script>';
    echo 'console.log('. json_encode( $id ) .')';
    echo '</script>';
  }