
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type='text/css' href='CSS/admin.css'>
        <title>Add upcoming Movies</title>
        <?php 
            include "Includes/isadmin.php";
            
            if (!isadmin()){
                header("location: notadmin.php");
            } 
            
            
        ?> 
    </head>
    <body>
        <?php include "includes/adminheader.php" ?>
        <div id="push-content">

        </div>

        <div id="page-content">

            <h2>Admin</h2>

            
            <?php include 'Includes/adminnav.php'?>
           
            <br>
            <h3>Upcoming Movie Details</h3>

            
            <form method="POST" action="addupcomingmovieprocess.php" enctype="multipart/form-data">
                Movie name: 
                <input type="text" name="moviename"><br>
                Release date:
                <input type="text" name="rdate"><br>
                Genere:
                <input type="text" name="genere"><br>
                <input type="file" name="photo"><br>
                <input type="submit" name="button" value="Add">
    
            </form>

            </div>

        </div>
    </body>
</html>
