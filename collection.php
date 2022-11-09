<?php
    require("connection.php");
    $select = mysqli_query($conn,"SELECT *FROM collection");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/collection.css">
</head>
<body>
<div class="display">

<?php 
while($row = mysqli_fetch_assoc($select)){
?>

<div class="card">
    <h1><?php echo $row['name'] ?></h1>
    <h4> <?php echo $row['artist'] ?> </h4>
    <a href="displaycollection.php?colname=<?php echo $row['name']; ?>">open</a>
</div>

<?php 
};
?>


</div>  
</body>
</html>