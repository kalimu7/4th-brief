<?php
    require("connection.php");
    $select = mysqli_query($conn,"SELECT *FROM collection");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="description" content="Les NFT, c’est quoi ? Que peut-on acheter avec des NFT ? Pourquoi suscitent-ils tant d’engouement ? Focus sur ces jetons virtuels à l’avenir prometteur">
    <link rel="stylesheet" href="css/statistics.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- *****header***** -->
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
    <!-- *****header***** -->
    <?php 
        
        $total = mysqli_query($conn,"SELECT COUNT(*) as ttl from nfttable");

        $max = "SELECT *FROM nfttable WHERE price in (SELECT MAX(price) FROM nfttable)";
        $maxnft = mysqli_query($conn,$max);

        $min = "SELECT * FROM nfttable WHERE price in (SELECT MIN(price) FROM nfttable)";
        $minnft = mysqli_query($conn,$min);

        $data = mysqli_fetch_assoc($total);

        

        
    ?>
    <!-- ****container**** -->
    <div class="container">
        
        <h1>statistics</h1>
        <div style="margin : 10px auto;" class="card">
            <h2>Total Nfts</h2>
            <?php echo '<span class="total" >'.$data['ttl'].'</span>' ?> <br>
            <div> <i class="fa-solid fa-chart-simple" ></i><i class="fa-solid fa-chart-simple"></i></div>
        </div>
        <div class="cardcon">


            <div>
                <div class="card card2">
                    <h2>Plus cher</h2>

                </div>

                <?php 
             while($row = mysqli_fetch_assoc($maxnft)){
                ?>
                <div class="card1">

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
                <?php    
                }
                 ?>
            </div>

            <div>
                <div class="card card2">
                    <h2>Moins cher</h2>
                </div>
                <?php 
                 while($row = mysqli_fetch_assoc($minnft)){
                ?>
                <div class="card1">

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
                <?php    
        }
        ?>
            </div>
        </div>



    </div>
    <!-- ****container**** -->
    <!-- *********footer******* -->
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
    <!-- *********footer******* -->
    <script src="./logic.js"></script>
</body>

</html>