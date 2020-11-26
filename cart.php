<?php

$servername = "localhost";
$username = "demyu";
$password = "123456789";
$dbname = "cart";

$conn = new mysqli($servername, $username, $password, $dbname);
$filegetter = file_get_contents("items.json");
$array = json_decode($filegetter, true);

$sql = "Select * from cart";
$result = $conn->query($sql);
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    <?php
        if ($result->num_rows == 0) {
    ?>
        <h1>Your cart is empty</h1>
    <?php
        }else{
            while ($row = $result->fetch_assoc()) {
                $base = $array[$row['id']]["price"] * $row['count'];
                $total += $base;
    ?>

            <h1>
                <?php
                        echo $array[$row['id']]["name"]; 
                ?>
            </h1>
            <h1>
                <img src="img/<?php echo $array[$row['id']]["img"]; ?>" style="width:100px;height:170px;"> 
                
                
                $
                <?php
                    echo $array[$row['id']]["price"]; 
                ?>
                <input type="number" id="quantity" name="quantity" onchange="checkTextBox(this, <?php echo $row['id'] ?>)" min="1" max="999" value ="<?php echo $row['count'] ?>">
                <input type="button" value="Delete" onclick="delete(<?php echo $row['id'] ?>)">

                
                
            </h1>


    
        <?php
            }
        }
        ?>
        <h1>Total : <input type="number" value = "<?php echo $total ?>" readonly id = "Total"></h1>


        <script>
            function checkTextBox(element, id){
                var total = document.getElementById("Total");
                var data = id;
                var numberitems = element.value;
                $.ajax({
                    url: "quantityUpdate.php",
                    type: 'POST',
                    data: { 'data' : data, 'numberitems' : numberitems},
                    success: function(data){
                        total.value = data;
                    },
                    error: function(xhr) {
                    alert('Error!  Status = ' + xhr.status + " Message = " + xhr.statusText);
                }
            });

            }
            function deleted(id){
                var data = id;
                var total = document.getElementById("Total");
                $.ajax({
                    url: "remove.php",
                    type: 'POST',
                    data: { 'data' : data},
                    success: function(data){
                        total.value = data;
                    },
                    error: function(xhr) {
                    alert('Error!  Status = ' + xhr.status + " Message = " + xhr.statusText);
                }
            });
            }
        </script>



<script src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>
</body>
</html>