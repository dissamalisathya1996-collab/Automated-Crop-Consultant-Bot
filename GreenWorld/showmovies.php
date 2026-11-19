<!DOCTYPE html>
<html>
<head>
    <title>All Movies</title>
    
    <link rel="stylesheet" type="text/css" href="CSS/showmovies.css">
    <link rel="stylesheet" type="text/css" href="CSS/showmoviesstyle.css">

    <style>
        h3{
            color:white;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size:20px;
        }
    </style>

</head>

<body>
    <div id = 'container'>
    <?php include "Includes/commonheader.php"; ?>
    <div id="push-content">

    </div>
<div id="allmov">
<h3> All Available Movies</h3>

<?php


include "Includes/databaseconn.php";

$sql = "SELECT * from movies";
$query = mysqli_query($conn, $sql);

if ($query){
    while($row = $query->fetch_array()){
        include 'Includes/moviebox.php';
    }
}
else{
    echo 'error';
}


?>

</div>
</div>




</body>
</html>
