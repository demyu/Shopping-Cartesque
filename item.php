<?php 

$filegetter = file_get_contents("items.json");
$array = json_decode($filegetter, true);

$id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $array[$id]["name"]; ?></title>
</head>
<p><a href="cart.php">Go to Cart</a></p>
<p><a href="index.php">Go to Store</a></p>

    <?php
        $filegetter = file_get_contents("items.json");
        $array = json_decode($filegetter, true);
        $cart;
        function addToArray(String $id){
            $test = (int) id;
            array_push($cart, $test);
            echo count($cart);
        }


    ?>

        <h1>
            <?php
                    echo $array[$id]["name"]; 
            ?>
        </h1>
        <h1>
            <div>
            <img src="img/<?php echo $array[$id]["img"]; ?>" style="width:100px;height:170px;"> 
            
            <?php
                    echo $array[$id]["desc"]; 
            ?>
            </div>


            <div style= "text-decoration-line: line-through;" >
                $
                <?php
                    echo $array[$id]["old_price"]; 
                ?>
            </div>
            
            $
            <?php
                echo $array[$id]["price"]; 
            ?>

            <div>
            <input type="button" value="Add to cart" onclick="addToCart(<?php echo $id ?>)">
            <input type="button" value="Buy now" onclick="goToStore(<?php echo $id ?>)"></div>
            
                

        </h1>

<script>
        function addToCart(id){
        var data = id;
        $.ajax({
            url : "process.php",
            type: 'POST',
            data : { 'data' : data},
            success:function(data)
            {
             },
             error: function(xhr) {
                alert('Error!  Status = ' + xhr.status + " Message = " + xhr.statusText);

            }
            });
        }

        function goToStore(id){
            var data = id;
            $.ajax({
                url : "process.php",
                type: 'POST',
                data : { 'data' : data},
                success:function(data)
                {
                    window.location.href = "cart.php";
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