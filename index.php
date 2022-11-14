<?php

    require("connection.php");
    if(isset($_POST['ajouter'])){
        
        $nftna = $_POST['nftname'];
        $nftde = $_POST['nftdescription'];
        $nftpr = $_POST['nftprice'];
        $nftim = $_FILES['nftimage']['name'];
        $nftim_temp = $_FILES['nftimage']['tmp_name'];
        $nftim_folder = 'img/'.$nftim;

        if(empty($nftna) || empty($nftde) || empty($nftpr) || empty($nftim)){
            $massage[] = "plese fill out the form";
            
        }else{
            $query  = "INSERT INTO nfttable(name,description,price,image) VALUES('$nftna','$nftde','$nftpr','$nftim') ";
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
    <link rel="stylesheet" href="css/style.css">


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
                <input type="file" name="nftimage" accept="image/png,image/jpeg,image/jpg" class="box"> <br>
                <button type="submit" name="ajouter">add a product</button>
            </form>
        </div>

        <div class="nftedit">
            <table>
                <thead>
                    <tr>
                        <th>Nft Image</th>
                        <th>Nft name</th>
                        <th>Nft Price</th>
                        <th>Nft Description</th>
                        <th>action</th>
                    </tr>
                </thead>

                <?php 
                    $select = mysqli_query($conn,"SELECT *FROM nfttable");
                    while($row = mysqli_fetch_assoc($select)){
                ?>

                     <tr>
                        <td> <img src="img/<?php echo $row['image']; ?>" width="150" height="100" > </td>
                        <td> <?php echo $row['name']; ?></td>
                        <td> <?php echo $row['price']; ?> </td>
                        <td> <?php echo $row['description']; ?></td>
                        <td >
                            <a href="update.php?edit=<?php echo $row['id'] ?>" class="btn"><i class="fa-solid fa-pen-to-square"></i></a> <br>
                            <a href="index.php?delete=<?php echo $row['id'] ?>" class="btn"><i class="fa-solid fa-trash"></i></a>
                        </td>
                     </tr>   



                <?php
                    };
                ?>
            </table>

        </div>

    </div>
</body>

</html>