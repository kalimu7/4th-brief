<?php
 require("connection.php");
    $id_colletion = $_GET['iddd'];
    $collectionName = $_GET['namecol'];
 
 
 $select = mysqli_query($conn,"SELECT *FROM nfttable");
 $selectcol = mysqli_query($conn,"SELECT *FROM collection");
 $a=[];
 while($col = mysqli_fetch_assoc($selectcol)){
    array_push($a,$col['name']);
}

 
   
    if(isset($_POST['ajouter'])){
        
        $nftna = $_POST['nftname'];
        $nftde = $_POST['nftdescription'];
        $nftpr = $_POST['nftprice'];
        $nftim = $_FILES['nftimage']['name'];
        $nftim_temp = $_FILES['nftimage']['tmp_name'];
        $nftim_folder = 'img/'.$nftim;
        $collectionid = 
        $collname = $collectionName ;
        if(empty($nftna) || empty($nftde) || empty($nftpr) || empty($nftim)  ){
            $massage[] = "plese fill out the form";
            
        }else{
            $query  = "INSERT INTO nfttable(name,description,price,image,collection,collectionid) VALUES('$nftna','$nftde','$nftpr','$nftim','$collname','$id_colletion') ";
            $uploaded = mysqli_query($conn,$query);
            if($uploaded){
                move_uploaded_file($nftim_temp,$nftim_folder);
                $massage[] = "new nft added succefully";
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
                <h3>ADD NEW NFTS</h3> <br>
                <input type="text" name="nftname" placeholder="enter name of your nft" class="box"> <br>
                <input type="text" name="nftdescription" placeholder="enter description of your nft" class="box"> <br>
                <input type="number" name="nftprice" placeholder="enter the price of your nft ETH" class="box" min="0">
                <br>
                <input type="text" name="collectionname" readonly class="box" value="<?php echo $collectionName;  ?>" placeholder="collection name">
                <br>
                <input type="file" name="nftimage" accept="image/png,image/jpeg,image/jpg" class="box"> <br>
                <button type="submit" name="ajouter">add a product</button>
            </form>
        </div>

        <div class="nftedit">


            <?php 
                    $select = mysqli_query($conn,"SELECT *FROM nfttable");
                    while($row = mysqli_fetch_assoc($select)){
                ?>



            <!-- ******************card*************** -->
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
                        <a href="index.php?delete=<?php echo $row['id'] ?>">delete</a>
                    </div>
                </div>
            </div>
            <!-- ************************************* -->



            <?php
                    };
                ?>


        </div>

    </div>
    
</body>

</html>