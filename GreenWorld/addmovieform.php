
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type='text/css' href='CSS/admin.css'>
        <title>Add Movies</title>
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
            <h3>Movie Details</h3>

            
            <form method="POST" action="addmovie.php" enctype="multipart/form-data">
                Movie name: 
                <input type="text" name="moviename"><br>
                Year:
                <input type="text" name="year"><br>
                Genere:
                <input type="text" name="genere"><br>
                <input type="file" name="photo"><br>
                <input type="submit" name="button" value="Add">
    
            </form>

            </div>

        </div>
    </body>
</html>
