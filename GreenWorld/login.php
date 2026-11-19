


<?php

session_start();

    $conn = mysqli_connect('localhost', 'root', '', 'movie_hut');
    $db = mysqli_select_db($conn, 'movie_hut');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query($conn, $sql);

    $row = $query->fetch_assoc();

    $user_id = $row['userID'];
    $userlevel = $row['user_level'];
    if ($row['password'] == $password){
        
        $_SESSION['user_id'] = $user_id;
        $_SESSION['userlevel'] = $userlevel;
        
        
        
        if ($userlevel == 0){
            header("location: index.php");
        }
        else if ($userlevel == 1){
            header("location: admin.php");
        }
        
    }
    else{
        echo "<script> alert('email password combination does no exist');</script>";
        echo "<a href=index.php>Home</a>";
        
    }
    
    

?>