<?php
include "databaseconn.php";
$userid = $_GET['id'];
$sql = "DELETE FROM users WHERE userId = $userid";
$query = mysqli_query($conn, $sql);

if($query){
    header('location: ../admin.php');
}
else{
    echo "error";
}

?>