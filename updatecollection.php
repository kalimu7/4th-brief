<?php
    require("connection.php");
    $update = $_GET['editcollection'];
    if(isset($_POST['update'])){
        $collectionname = $_POST['collectionname'];
        $artist = $_POST['artist'];
        $collectionimage = $_FILES['image']['name'];
        $imagetmp = $_FILES['image']['tmp_name'];
        $collectionimagefolder = 'img/'.$collectionimage ;

        if( empty($collectionimage)){
            $query = "UPDATE collection SET name='$collectionname',artist='$artist' WHERE idcollection = $update";
            $uploaded  = mysqli_query($conn,$query);
            $massage[] = "succenfully updated";
            header('location:collection.php');
        }else{
            $query = "UPDATE collection SET name='$collectionname',artist='$artist',image='$collectionimage' WHERE idcollection = $update";
            $uploaded  = mysqli_query($conn,$query);
            if($uploaded){
                move_uploaded_file($imagetmp,$collectionimagefolder);
                $massage[] = "succenfully updated";
                header('location:collection.php');
            }else{
                $massage[] = "couldnt be updated";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="description" content="Les NFT, c’est quoi ? Que peut-on acheter avec des NFT ? Pourquoi suscitent-ils tant d’engouement ? Focus sur ces jetons virtuels à l’avenir prometteur">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    $ds = "SELECT *FROM collection WHERE idcollection = $update";
    $dsp = mysqli_query($conn,$ds);
        
        while($row = mysqli_fetch_assoc($dsp)){
    ?>
    
    <div class="formcontainer conform">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <h3>Update Your collection</h3> <br>
        <input type="text" name="collectionname" class="box" value="<?php echo $row['name']; ?>"> <br>
        <input type="text" name="artist" class="box" value="<?php echo $row['artist']; ?>"> <br>
        <input type="file" name="image" class="box" > <br>
        <button type="submit" name="update" >update</button>
        <a href="collection.php">back</a>
    </form>
    </div>
    
    <?php 
        }
    ?>
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