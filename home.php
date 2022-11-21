<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Render All elements normally -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- *************font awesome************** -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Css File -->
    <link rel="stylesheet" href="css/main.css">
    <title>Acceuil</title>
</head>

<body>
    <!-- Start Header -->

    <!-- End Header -->
    <!-- Start Landing -->
    <div class="landing">
        <div class="home">
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
            <div class="homecontainer">
                <div class="col">
                    <h1 class="create">Create</h1>
                    <h2 class="own-nft">Your own NFT</h2>
                    <button><a href="http://localhost/4th-brief/collection.php">View collection</a></button>
                </div>
                <div class="col1">
                    <img src="./img/nft_image_home-removebg-preview.png" alt="" srcset="">
                </div>
            </div>
        </div>
    </div>
    <!-- End Landing -->
    <!-- Start Cards -->
    <div class="content-body">
        <div class="el1">
            <h2 class="titre">our nft be like</h2>
            <div class="card nft-card-left">
                <img src="./img/nft-test.png" alt="" class="nftimg">
                <div class="info">
                    <h2 class="name">Bored Apes</h2>
                    <p class="description">Bullrun Babes are 8888 uniquely generated collectibles built.</p>

                    <div class="price">
                        <div style="display: flex; align-items: center;">
                            <i class='fab fa-ethereum' style='font-size:30px'></i>
                            <p>10 ETH</p>
                        </div>
                        <div class="duration">
                            <i class="fa-solid fa-clock" style='font-size:18px'></i>
                            <p>11 days left</p>
                        </div>
                    </div>
                    <hr>
                    <div class="buttons">
                        <a href="">update</a>
                        <a href="">delete</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="add-buttons">
            <button><a href="http://localhost/4th-brief/index.php"> Add NFT</a></button>
            <button><a href="http://localhost/4th-brief/addcollection.php"> Add Collection</a></button>
        </div>
        <div class="el1">
            <h2 class="titre1">our collection be like</h2>

            <div class="card nft-card-right">
                <img src="img/nft-collection.jpg" alt="" class="nftimg">
                <div class="info">
                    <h2 class="name">Bored</h2>
                    <p class="description">van gogh</p>

                    <div class="price">
                        <!-- <div style="display: flex; align-items: center;">
                        <i class='fab fa-ethereum' style='font-size:30px'></i>
                        <p class="prc"> ETH</p>
                    </div> -->
                        <!-- <div class="duration">
                        <i class="fa-solid fa-clock" style='font-size:18px'></i>
                        <p>11 days left</p>
                    </div> -->
                    </div>
                    <hr>
                    <div class="buttons">
                        <a href="">update</a>
                        <a href="">delete</a>
                        <a href="">open</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Cards -->
    <!-- Start Discover -->
    <div class="discover">
        <h2>How it Works</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum incidunt saepe quod vitae quis <br>
            pariatur doloribus inventore vero atque provident illo, natus nesciunt porro ipsam accusamus </p>
        <div class="parts">
            <div class="sellyournft">
                <i class="fa-solid fa-wallet"></i>
                <h3>Set Up Your Wallet</h3>
                <p>Lorem ipsum dolor sit.lorem <br> Lorem ipsum dolor sit amet. <br> Lorem ipsum dolor sit.</p>
            </div>
            <div class="add">
                <!-- <img src="/img/add-layer-layers-svgrepo-com.svg" width="30px" height="30px" style="background: rgb(255, 255, 255)  ;" alt="" srcset=""> -->
                <i class="fa-solid fa-folder-plus"></i>
                <h3>Add Your Nft</h3>
                <p>Lorem ipsum dolor sit.lorem <br> Lorem ipsum dolor sit amet. <br> Lorem ipsum dolor sit.</p>
            </div>
            <div class="sell">
                <i class="fa-solid fa-cart-shopping"></i>
                <h3>Sell Your Nft</h3>
                <p>Lorem ipsum dolor sit.lorem <br> Lorem ipsum dolor sit amet. <br> Lorem ipsum dolor sit.</p>
            </div>
        </div>
    </div>
    <!-- End Discover -->
    <!-- ************footer************** -->
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