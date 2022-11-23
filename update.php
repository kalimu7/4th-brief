<?php 
    require("connection.php");
    $id = $_GET['edit'];
    
    if(isset($_POST['modifier'])){
        
        $nftna = $_POST['nftname'];
        $nftde = $_POST['nftdescription'];
        $nftpr = $_POST['nftprice'];
        $old = $_POST['old_image'];
        $collname = $_POST['collectionname'];
        $nftim = $_FILES['nftimage']['name'];
        $nftim_temp = $_FILES['nftimage']['tmp_name'];
        $nftim_folder = 'img/'.$nftim;
        if(empty($nftim)){
            $update  = "UPDATE nfttable SET name='$nftna',description='$nftde',price='$nftpr',collection='$collname' where ID=$id";
        }else{
            $update  = "UPDATE nfttable SET name='$nftna',description='$nftde',price='$nftpr',image='$nftim',collection='$collname' where ID=$id";
        }
        if(empty($nftna) && empty($nftde) && empty($nftpr)){
            $massage[] = "plese fill out the form";
        }else{
            // $update  = "UPDATE nfttable SET name='$nftna',description='$nftde',price='$nftpr',image='$nftim' where ID=$id";
            $uploaded = mysqli_query($conn,$update);
            if($uploaded){
                move_uploaded_file($nftim_temp,$nftim_folder);
                $massage[] = "updated succefully";
                header('location:displaycollection.php?colname='.$collname);
            }else{
                $massage[] = "could not be updated";
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
    <title>admin page</title>
    <meta name="description" content="Les NFT, c’est quoi ? Que peut-on acheter avec des NFT ? Pourquoi suscitent-ils tant d’engouement ? Focus sur ces jetons virtuels à l’avenir prometteur">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
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
    <div class="container_update">
        <div class="formcontainer">

        <?php 
            $select = mysqli_query($conn,"SELECT *FROM nfttable WHERE ID =$id");
            while($row = mysqli_fetch_assoc($select)){
        ?>

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                <h3>UPDATE YOUR NFTS </h3> <br>
                <input type="text" name="nftname" placeholder="enter name of your nft" class="box" value="<?php echo $row['name']; ?>"> <br>
                <!-- <input type="text" name="nftdescription" placeholder="enter description of your nft"value="" class="box"> <br> -->
                <textarea name="nftdescription" class="box" value="<?php echo $row['description']; ?>"><?php echo $row['description']; ?></textarea> <br>
                <input type="number"  name="nftprice" placeholder="enter the price of your nft ETH" value="<?php echo $row['price']; ?>" class="box" min="0"> <br>
                <input type="text" class="box" readonly name="collectionname" value="<?php echo $row['collection']  ?>">
                <br>
                <img src="img/<?php echo $row['image']; ?>" height="150" >
                <span name="old_image" value="<?php echo $row['image']; ?>" ><?php echo $row['image']?></span>
                <input type="file" name="nftimage" accept="image/png,image/jpeg,image/jpg" class="box"> <br>
                <button  type="submit" name="modifier">update</button>
                <a href="displaycollection.php?colname=<?php echo $row['collection']; ?>">Back</a>
            </form>

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