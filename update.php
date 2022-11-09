<?php 
    require("connection.php");
    $id = $_GET['edit'];
    if(isset($_POST['modifier'])){
        
        $nftna = $_POST['nftname'];
        $nftde = $_POST['nftdescription'];
        $nftpr = $_POST['nftprice'];
        $nftim = $_FILES['nftimage']['name'];
        $nftim_temp = $_FILES['nftimage']['tmp_name'];
        $nftim_folder = 'img/'.$nftim;

        if(empty($nftna) && empty($nftde) && empty($nftpr) && empty($nftim)){
            $massage[] = "plese fill out the form";

        }else{
            $update  = "UPDATE nfttable SET name='$nftna',description='$nftde',price='$nftpr',image='$nftim' where ID=$id";
            $uploaded = mysqli_query($conn,$update);
            if($uploaded){
                move_uploaded_file($nftim_temp,$nftim_folder);
                
                $massage[] = "updated succefully";
                header('location:index.php');
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
    <div class="container_update">
        <div class="formcontainer">

        <?php 
            $select = mysqli_query($conn,"SELECT *FROM nfttable WHERE ID =$id");
            while($row = mysqli_fetch_assoc($select)){
        ?>

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                <h3>UPDATE YOUR NFTS</h3> <br>
                <input type="text" name="nftname" placeholder="enter name of your nft" class="box" value="<?php echo $row['name']; ?>"> <br>
                <input type="text" name="nftdescription" placeholder="enter description of your nft"value="<?php echo $row['description']; ?>" class="box"> <br>
                <input type="number" name="nftprice" placeholder="enter the price of your nft ETH" value="<?php echo $row['price']; ?>" class="box" min="0">
                <br>
                <img src="img/<?php echo $row['image']; ?>" height="150" >
                <input type="file" name="nftimage" accept="image/png,image/jpeg,image/jpg" class="box"> <br>
                <button type="submit" name="modifier">update</button>
                <a href="index.php">Back</a>
            </form>

            <?php 
            };
            ?>

        </div>
    </div>
</body>

</html>