<!DOCTYPE html>
<html>
    <head>

        <style>
body {
  background-image: url('vvv.jpg');
}

      </style>  
        <title>Sign Up</title>
        <link rel="stylesheet" type="text/css" href="CSS/register.css">
        
        <script src="Scripts/regvalidate.js"></script>
       

    </head>

    
    
    <body>
    
    

        <?php include "Includes/commonheader.php"; ?>

        <div id="form">
        <form method="POST" action="Register.php" onsubmit="return validation();" >
            <p class="label">First name</p>
            <input type="text" name="fname" class="textbox">
            <p class="label">Last name</p>
            <input type="text" name="lname" class="textbox">
            <p class="label">Email</p>
            <input type="text" name="email" class="textbox" id="email">
            <p class="label">Phone(with country code)</p>
            <input type="text" name="phone" class="textbox">
            <p class="label">password</p>
            <input type="password" name="password" class="textbox" id="password">
            <p class="label">Retype password</p>
            <input type="password" name="password2" class="textbox" id="password2"><br>
            <input type="submit" name="signup" value="Sign Up" id="button" >
           
        </form>

     </body>   
</html>