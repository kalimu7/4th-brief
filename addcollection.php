<?php
    require("connection.php");
    if(isset($_POST['ajouter'])){
        $collectionname = $_POST['collectionname'];
        $artist = $_POST['artist'];
        $collectionimage = $_FILES['image']['name'];
        $imagetmp = $_FILES['image']['tmp_name'];
        $collectionimagefolder = 'img/'.$collectionimage ;

        if(empty($collectionname) || empty($artist) || empty($collectionimage)){
            $massage[] = "plese fill out the form";
        }else{
            $query  = "INSERT INTO collection (name,artist,image) VALUES ('$collectionname','$artist','$collectionimage') ";
            $uploaded  = mysqli_query($conn,$query);
            if($uploaded){
                move_uploaded_file($imagetmp,$collectionimagefolder);
                $massage[] = "succenfully inserted";
                header('location:collection.php');
            }else{
                $massage[] = "couldnt be inserted";
            }
        }

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Les NFT, c’est quoi ? Que peut-on acheter avec des NFT ? Pourquoi suscitent-ils tant d’engouement ? Focus sur ces jetons virtuels à l’avenir prometteur">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/addcollection.css">
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
    <?php 
        if(isset($massage)){
            foreach($massage as $msg){
                echo '<span class="msg">' .$msg. '</span>';
            }
    }
    ?>
    <div class="container">

    <div class="formcontainer">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
            <h3>ADD NEW collection</h3> <br>
            <input type="text" placeholder="nom de la collection" name="collectionname" class="box"> <br>
            <input type="text" placeholder="nom de lartist" name="artist" class="box"> <br>
            <input type="file" name="image" class="box"> <br>
            <button type="submit" name="ajouter">ajouter</button>
            <a href="collection.php">back</a>
        </form>
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