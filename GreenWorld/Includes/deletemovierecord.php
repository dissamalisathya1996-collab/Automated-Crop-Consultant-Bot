<?php
include "databaseconn.php";
$movieid = $_GET['id'];
$sql = "DELETE FROM movies WHERE movieid = $movieid";
$query = mysqli_query($conn, $sql);

if($query){
    header('location: ../admin.php');
}
else{
    echo "error";
}

?>