<?php
    $collectionid = $_GET["idcollection"];
    require("connection.php");
    $match = $_GET['colname'];
    $select = mysqli_query($conn,"SELECT *FROM nfttable WHERE collection = '$match' ");
    

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        mysqli_query($conn,"DELETE FROM nfttable WHERE ID = $id");
        header('location:displaycollection.php?colname='.$match);
    }

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
    <?php echo $match ?>
    <div class="container">
    <h1 id="titre" >your collection contains</h1>
    </div>
    <div class="display">
    
    <?php 
    while($row = mysqli_fetch_assoc($select)){
    ?>
    


    <div class="card">
                <img src="img/<?php echo $row['image']; ?>" alt="" class="nftimg">
                <div class="info">
                    <h2 class="name"><?php echo $row['name']; ?></h2>
                    <p class="description"><?php echo $row['description']; ?>.</p>

                    <div class="price">
                        <div style="display: flex; align-items: center;">
                            <i class='fab fa-ethereum' style='font-size:30px'></i>
                            <p class="prc"><?php echo $row['price']; ?> ETH</p>
                        </div>
                        <div class="duration">
                            <i class="fa-solid fa-clock" style='font-size:18px'></i>
                            <p>11 days left</p>
                        </div>
                    </div>
                    <hr>
                    <div class="buttons">
                        <a href="update.php?edit=<?php echo $row['id'] ?>">update</a>
                        <a href="displaycollection.php?delete=<?=$row['id']?>&colname=<?=$match?> ">delete</a>
                    </div>
                </div>
            </div>
            <!-- ************************************* -->

        <?php 
        };
        ?>
    </div>
    <a href="collection.php">Back to all the collection</a>
    <a href="index.php?namecol=<?=$match?>&iddd=<?=$collectionid?>">add an nft</a>
</body>

</html>