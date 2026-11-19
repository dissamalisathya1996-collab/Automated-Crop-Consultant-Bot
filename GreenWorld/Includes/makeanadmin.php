<?php

include 'databaseconn.php';

$userid = $_GET['key'];
$sql = "UPDATE users SET user_level=1 where userid = $userid";
mysqli_query($conn, $sql);
header('location: ../admin.php');



?>