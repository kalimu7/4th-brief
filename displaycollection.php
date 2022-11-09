<?php
    require("connection.php");
    $match = $_GET['colname'];
    $select = mysqli_query($conn,"SELECT *FROM nfttable WHERE collection = '$match' ");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/display.css">
</head>

<body> 
    
    <div class="container">
    <h1 id="titre" >your collection contains</h1>
    </div>
    <div class="display">
    
    <?php 
    while($row = mysqli_fetch_assoc($select)){
    ?>
    
        <div class="card">
            <img src="img/<?php echo $row['image']; ?> ">
            <h3><?php echo $row['name']; ?></h3>
            <p> <?php echo $row['description']; ?> </p>
            <span><?php echo $row['price']; ?> </span>
        </div>

        <?php 
        };
        ?>
    </div>
    <a href="collection.php">Back to all the collection</a>
</body>

</html>