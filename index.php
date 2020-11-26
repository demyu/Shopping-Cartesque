<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>

<body>
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

    <?php
    for ($i=0; $i < count($array); $i++) { 
    ?>
        <h1>
            <img src="img/<?php echo $array[$i]["img"]; ?>" style="width:100px;height:170px;"> 
            
            <?php
                echo $array[$i]["name"]; 
            ?>

            <input type="button" value="Add to cart" onclick="addToCart(<?php echo $array[$i]["id"] ?>)">


        
        </h1>

    <?php
    }
    ?>

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
</script>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>
</body>

   

</html>