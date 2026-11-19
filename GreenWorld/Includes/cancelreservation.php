
<?php
include "databaseconn.php";
$rentid = $_GET['id'];

$delete = "DELETE FROM rent WHERE rent_id=$rentid ";
$deletequery = mysqli_query($conn,$delete );


if ($delete){
    $userid = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE userid = $userid";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    $email = $row['email'];
    $phone = $row['phone'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    

    $sent = mail($email,"Movie Hut", "Your reservation has been successfully cancelled.", "From: moviehut@fastmail.com");
    require('../Textlocal.class.php');
    $Textlocal = new Textlocal(false, false, 's/g5HIGl4U8-gUfQBNYPpp1Op4XTXim12Nh0qfrMcE');
            
	$numbers = array($phone);
	$sender = 'Movie Hut';
    $message = "Hi $fname $lname, \r\n Your reservation has been successfully cancelled. \r\n \r\n Thank You!";
 
	$response = $Textlocal->sendSms($numbers, $message, $sender);
    

    header("location: ../profile.php");
}


?>