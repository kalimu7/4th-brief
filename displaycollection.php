<?php
    // $collectionid = $_GET["idcollection"];
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/display.css">
</head>

<body>
    <header>
        <div class="navigation-bar">
            <a href="" class="logo">
                <img class="logo" src="img/NFTealogov1.png" alt="NFT LOGO">
            </a>
            <nav>
                <ul>
                    <li><a href="home.php">Acceuil</a></li>
                    <li><a href="collection.php">Collection</a></li>
                    <li><a href="statistics.php">Statistiques</a></li>
                </ul>
            </nav>
            <i class="fa-sharp fa-solid fa-list" id="humb"></i>
        </div>
    </header>
    <div class="bodycontainer">


        <div class="container">
            <a class="btmlinks" href="collection.php">Back to all the collection</a>
            <h1 id="titre">your collection contains</h1>
            <a class="btmlinks" href="index.php?namecol=<?=$match?>">add an nft</a>
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
        
    </div>
    <footer>
        <div class="meta">
            <h2>METAVERSE</h2>
            <p>
                Lorem ipsum dolor sit amet consectetur,<br> adipisicing elit. Earum.
            </p>
            <div class="icons">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-linkedin"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-twitter"></i>
            </div>
        </div>
        <div class="exp">
            <h2>Explore</h2>
            <a href="#">About</a>
            <a href="#">About</a>
            <a href="#">About</a>
            <a href="#">About</a>
        </div>
        <div class="contact">
            <h2>Contact Us</h2>
            <div><i class="fa-solid fa-envelope"></i> <span>Lorem, ipsum dolor@gmail.com</span></div>
            <div><i class="fa-solid fa-phone"></i> <span>+2126-87879978</span></div>
            <div><i class="fa-solid fa-location-pin"></i> <span>Lorem ipsum dolor sit.</span></div>
        </div>
        <div class="newslatter">
            <h2>Newslatter</h2>
            <p>
                Lorem ipsum dolor sit amet consectetur,<br> adipisicing elit. Earum.
            </p>
            <input type="email" placeholder="your feedback"> <button><i
                    class="fa-sharp fa-solid fa-rocket"></i></button>
        </div>

    </footer>
    <script src="./logic.js"></script>
</body>

</html>