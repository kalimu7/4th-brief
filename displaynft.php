<?php
    require("connection.php");
    $select = mysqli_query($conn,"SELECT *FROM nfttable");
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
    <div class="display">

        <?php 
        while($row = mysqli_fetch_assoc($select)){
    ?>

        <div class="card">
            <img src="img/<?php echo $row['image']; ?> ">
            <h3><?php echo $row['name'] ?></h3>
            <p> <?php echo $row['description'] ?> </p>
            <span><?php echo $row['price'] ?>  </span>
        </div>

        <?php 
    };
    ?>


    </div>
</body>

</html>