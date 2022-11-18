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
    ?>
    <div class="formcontainer">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <h3>ADD NEW collection</h3> <br>
        <input type="text" name="collectionname" class="box"> <br>
        <input type="text" name="artist" class="box"> <br>
        <input type="file" name="image" class="box"> <br>
        <button type="submit" name="ajouter" >ajouter</button>
        <a href="collection.php">back</a>
    </form>
    </div>
    
</body>

</html>