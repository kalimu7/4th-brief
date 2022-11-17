<?php
    require("connection.php");
    $select = mysqli_query($conn,"SELECT *FROM collection");
    if(isset($_GET['deletecollection'])){
        $idco = $_GET['deletecollection'];
        mysqli_query($conn,"DELETE FROM collection WHERE idcollection = $idco");
        header('location:collection.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/collection.css">
</head>

<body>
    <div class="display">

        <?php 
        while($row = mysqli_fetch_assoc($select)){
        ?>



        <div class="card">
            <img src="img/<?php echo $row['image']; ?>" alt="" class="nftimg">
            <div class="info">
                <h2 class="name"><?php echo $row['name']; ?></h2>
                <p class="description"><?php echo $row['artist'] ?>.</p>

                <div class="price">
                    <div style="display: flex; align-items: center;">
                        <i class='fab fa-ethereum' style='font-size:30px'></i>
                        <p class="prc"> ETH</p>
                    </div>
                    <div class="duration">
                        <i class="fa-solid fa-clock" style='font-size:18px'></i>
                        <p>11 days left</p>
                    </div>
                </div>
                <hr>
                <div class="buttons">
                    <a href="updatecollection.php?editcollection=<?php echo $row['idcollection']; ?>">update</a>
                    <a href="collection.php?deletecollection=<?php echo $row['idcollection']; ?>">delete</a>
                    <a href="displaycollection.php?colname=<?php echo $row['name']; ?>&idcollection=<?php echo $row['idcollection']; ?>   ">open</a>
                </div>
            </div>
        </div>
        <!-- ************************************* -->

        <?php 
};
?>
    </div>
    <a href="addcollection.php">add new collection</a>
</body>

</html>