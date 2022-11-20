<?php
 require("connection.php");
    // if(isset($_GET['iddd'])){
    //     $id_colletion = $_GET['iddd'];
    // }
        
    // $collectionName = $_GET['namecol'];
 
 $select = mysqli_query($conn,"SELECT *FROM nfttable");
 $selectcol = mysqli_query($conn,"SELECT *FROM collection");
 $a=[];
 while($col = mysqli_fetch_assoc($selectcol)){
    array_push($a ,$col['name'],$col['idcollection']);
}

 
   
    if(isset($_POST['ajouter'])){
        
        $nftna = $_POST['nftname'];
        $nftde = $_POST['nftdescription'];
        $nftpr = $_POST['nftprice'];
        $nftim = $_FILES['nftimage']['name'];
        $nftim_temp = $_FILES['nftimage']['tmp_name'];
        $nftim_folder = 'img/'.$nftim;
        $collname = $_POST['collectionname'] ;
        /*
            get the id fro; collection table;
            foreign key
        */

        for($i=0;$i<count($a);$i++){
            if(strcmp( $a[$i] , $collname) == 0 ){
                $id_colletion = $a[$i+1];         
            }
        }
        //
        if(empty($nftna) || empty($nftde) || empty($nftpr) || empty($nftim) || empty($collname)  ){
            $massage[] = "plese fill out the form";
            
        }elseif(!in_array($collname,$a)){//just to prevent the user from adding new neft to a collection that doesnt exist
            print_r($a);
            $check =  in_array($collname,$a);
            echo 'the collection name = '.$collname;
            echo 'check'.$check;
            $massage[] = "collection doesnt exist id d";
        }else{
            $query  = "INSERT INTO nfttable(name,description,price,image,collection,collectionid) VALUES('$nftna','$nftde','$nftpr','$nftim','$collname','$id_colletion') ";
            $uploaded = mysqli_query($conn,$query);
            if($uploaded){
                move_uploaded_file($nftim_temp,$nftim_folder);
                $massage[] = "new nft added succefully".'id de la collection = '.$id_colletion;
            }else{
                $massage[] = "could not be added";
            }
        }


    }
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        mysqli_query($conn,"DELETE FROM nfttable WHERE ID = $id");
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>

    <header>
        <div class="navigation-bar">
            <a href="" class="logo">
                <img class="logo" src="img/NFTealogov1.png" alt="NFT LOGO">
            </a>
            <nav>
                <ul>
                    <li><a href="#">Acceuil</a></li>
                    <li><a href="#">Collection</a></li>
                    <li><a href="#">Statistiques</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="msg1">
    <?php
    if(isset($massage)){
            foreach($massage as $msg){
                echo '<span class="msg">' .$msg. '</span>';
            }
    }

    ?>
    </div>
    <div class="container">
       <div class="formcontainer">

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                <h3>ADD NEW NFTS</h3> <br>
                <input type="text" name="nftname" placeholder="enter name of your nft" class="box"> <br>
                <input type="text" name="nftdescription" placeholder="enter description of your nft" class="box"> <br>
                
                <input type="number" name="nftprice" placeholder="enter the price of your nft ETH" class="box" min="0">
                <br>
                <input type="text" name="collectionname" class="box" placeholder="collection name">
                <br>
                <input type="file" name="nftimage" accept="image/png,image/jpeg,image/jpg" class="box"> <br>
                <button type="submit" name="ajouter">add a product</button>
            </form>
        </div>

        <div class="nftedit">


            <?php 
                    // $select = mysqli_query($conn,"SELECT *FROM nfttable");
                    // while($row = mysqli_fetch_assoc($select)){
                ?>



            <!-- ******************card*************** -->
            <!-- <div class="card">
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
                        <a href="index.php?delete=<?php echo $row['id'] ?>">delete</a>
                    </div>
                </div>
            </div> -->
            <!-- ************************************* -->



            <?php
                    // };
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

</body>

</html>