<!DOCTYPE html>
<html>
    <head><title>Home</title><head>

    <body>
        <h1>This is Homepage</h1>
        
        <?php

            include 'Includes/loggedin.php';
            if (logged_in()){
                echo 'logged in';
                include 'Includes/logoutbutton.php';
            }
            else{
                echo 'not logged in';
                include 'Includes/loginbutton.php';
            }
        ?>


        
    </body>


</html>