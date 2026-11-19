<!DOCTYPE html>
<html>
    <head><title>Add movie</title></head>

    <body>
        <?php

            include "Includes/databaseconn.php";

            
            
            if (isset($_POST['button']))
            {   
                $moviename = $_POST['moviename'];
                $year = $_POST['year'];
                $genere = $_POST['genere'];

                

                $temp = addslashes(file_get_contents($_FILES['photo']['tmp_name']));

                $sql = "INSERT INTO movies (movieid, moviename, year, genere, stock, image) VALUES(NULL, '$moviename', '$year', '$genere', '5', '$temp');";
                $query = mysqli_query($conn, $sql);

                header('location: admin.php');
                
                    
               
            }
            ?>


            

    </body>


</html>