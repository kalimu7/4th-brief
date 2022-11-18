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
    <link rel="stylesheet" href="css/addcollection.css">
</head>

<body>
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
    
    <div class="formcontainer">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <h3>ADD NEW collection</h3> <br>
        <input type="text" name="collectionname" class="box" value="<?php echo $row['name']; ?>"> <br>
        <input type="text" name="artist" class="box" value="<?php echo $row['artist']; ?>"> <br>
        <input type="file" name="image" class="box" > <br>
        <button type="submit" name="update" >update</button>
    </form>
    </div>
    
    <?php 
        }
    ?>

</body>

</html>