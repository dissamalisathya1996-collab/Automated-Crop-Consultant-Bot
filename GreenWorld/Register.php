<?php
   
   session_start();

   $conn = mysqli_connect("localhost", "root", "");
   $db = mysqli_select_db($conn, "movie_hut");

   

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'" );
    $y = 0;
    while($row = $query->fetch_assoc()){
       $y = $y + 1; 
    }
    if ($y<1){

        $x = rand(10000, 99999); //random number

        $_SESSION["emailid"]=$email;
        $_SESSION["firstname"]=$fname;
        $_SESSION["lastname"]=$lname;
        $_SESSION["phone"]=$phone;
        $_SESSION["password"]=$password;
        $_SESSION["vcode"]=$x;
   

        $sent = mail($email,"Verify your email", "your code: $x", "From: moviehut@fastmail.com");

        if ($sent == true){
                echo "email sent successfully";
                include "verifyemail.php";


        }
        else{
            echo "faild";
        }
    }
    else{
        echo "Email is already in use";
    }






?>