<?php
include "databaseconn.php";
$umid = $_GET['id'];
$sql = "DELETE FROM upcoming_movies WHERE umid = $umid";
$query = mysqli_query($conn, $sql);

if($query){
    header('location: ../admin.php');
}
else{
    echo "error";
}

?>