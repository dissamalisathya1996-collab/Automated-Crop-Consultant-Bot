<?php
    
    session_start();

    $conn = mysqli_connect('localhost', 'root', '');
    $db = mysqli_select_db($conn, 'movie_hut');


    $fname =$_SESSION["firstname"];
    $lname =$_SESSION["lastname"];
    $email =$_SESSION["emailid"];
    $phone =$_SESSION["phone"];
    $password = $_SESSION["password"];
    $verify_code =$_SESSION["vcode"];

    $vcode = $_POST['vcode'];
    if ($verify_code == $vcode){
        $sql = "INSERT into users (userID, fname, lname, email, phone, password) values(NULL,'$fname', '$lname', '$email', '$phone', '$password')";
        $query = mysqli_query($conn, $sql);
        if ($query){
		    $sent = mail($email,"Registration successful!", "Welcome to GreenWorld.", "From: moviehut@fastmail.com");
            require('Textlocal.class.php');
 
	        $Textlocal = new Textlocal(false, false, 's/g5HIGl4U8-gUfQBNYPpp1Op4XTXim12Nh0qfrMcE');
            
	        $numbers = array($phone);
	        $sender = 'Movie Hut';
	        $message = "Welcome to Disna CD World. Now you can reserve latest movies from us.";
 
	        /*$response = $Textlocal->sendSms($numbers, $message, $sender);*/
            
            header("location: index.php");
        }

        
    }
    else{
        echo "faild, try again";
    }
    


/*?>