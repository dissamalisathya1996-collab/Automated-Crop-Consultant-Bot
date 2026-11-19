<?php

include "Includes/databaseconn.php";
$movieid = $_GET['id'];
$userid = $_SESSION['user_id'];

$select = "SELECT rent_id FROM rent WHERE user_ID = '$userid'";

$query = mysqli_query($conn, $select);


$num = mysqli_num_rows($query);

if ($num>1){
    echo "you can't reserve anymore movies";
}
else{

    $sql2 = "SELECT stock, moviename FROM movies WHERE movieid = $movieid";
    $query3 = mysqli_query($conn, $sql2);
    $result = mysqli_fetch_array($query3);
    $stock = $result['stock'];

    if ($stock>0){
        $newstock = $stock - 1;
        

    


            $sql = "INSERT INTO rent (user_ID, movie_ID) VALUES('$userid', '$movieid')";
            $query2 = mysqli_query($conn, $sql);
            if ($query2){
        
        
                $sql3 = "UPDATE movies SET stock = $newstock WHERE movieid=$movieid";
                $query4 = mysqli_query($conn, $sql3);

                $userdetailssql = "SELECT email, fname, lname,phone FROM users WHERE userid = '$userid'";
                $userdetailsquery = mysqli_query($conn, $userdetailssql);
                $userdetails = mysqli_fetch_array($userdetailsquery);
                $email = $userdetails['email'];
                $fname = $userdetails['fname'];
                $lname = $userdetails['lname'];
                $moviename = $result['moviename'];
                $phone = $userdetails['phone'];

                $sent = mail($email,"Movie Hut", "Hi $fname $lname, \r\n $moviename is Ready to pickup. You can swing by and pickup anytime. \r\n \r\n Thank You!", "From: moviehut@fastmail.com");
                
                require('Textlocal.class.php');
 
	            $Textlocal = new Textlocal(false, false, 's/g5HIGl4U8-gUfQBNYPpp1Op4XTXim12Nh0qfrMcE');
            
	            $numbers = array($phone);
	            $sender = 'Movie Hut';
	            $message = "Hi $fname $lname, \r\n $moviename is Ready to pickup. You can swing by and pickup anytime. \r\n \r\n Thank You!";
 
	            $response = $Textlocal->sendSms($numbers, $message, $sender);

                echo 'successfully reserved';
                echo '<br><a href="index.php">Home</a>';


            }
        }
        
        
        else{
            echo 'this movie is out of stock';
}

}


?>