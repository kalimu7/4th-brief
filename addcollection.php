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
</head>

<body>
    <?php 
        if(isset($massage)){
            foreach($massage as $msg){
                echo '<span class="msg">' .$msg. '</span>';
            }
    }
    ?>
    
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <h3>ADD NEW collection</h3> <br>
        <input type="text" name="collectionname">
        <input type="text" name="artist">
        <input type="file" name="image">
        <button type="submit" name="ajouter">ajouter</button>
    </form>
</body>

</html>