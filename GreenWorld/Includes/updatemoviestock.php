
<!--
<form action='updatemoviestock.php' method='psot'>
<input type='text' name='newstock'>
<input type='submit' name='update'>
</form>
-->
<?php 
include 'databaseconn.php';

if (isset($_POST['update'])){
    $nstock = $_POST['newstock'];
    $stock = $_GET['key'];
    $movieid = $_GET['id'];
    $newstock= $stock + $nstock; 
    
    $updatesql = "UPDATE movies SET stock='$newstock' WHERE movieid = '$movieid' ";
    $updatequery = mysqli_query($conn, $updatesql);
    header('location: ../deletemovie.php');
}

?>