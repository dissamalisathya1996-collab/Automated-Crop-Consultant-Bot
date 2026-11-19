<!DOCTYPE html>
<html>
    <head><title>Add movie</title></head>

    <body>
        <?php

            include "Includes/databaseconn.php";

            
            if (isset($_POST['button']))
            {   
                $moviename = $_POST['moviename'];
                $rdate = $_POST['rdate'];
                $genere = $_POST['genere'];

                //$filename = $_FILES['photo']['name'];
                //$tempname = $_FILES['photo']['tmp_name'];
                //$filesize = $_FILES['photo']['size'];
               // $filetype = $_FILES['photo']['type'];
                
               // $tmp=explode('.',$filename);
               // $ext = end($tmp);

               // $expensions= array("jpeg","jpg","png");
              //  move_uploaded_file($tempname,"images/".$filename);

                $temp = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
                

                $sql = "INSERT INTO upcoming_movies (umname, release_date, genere, umimage) VALUES('$moviename', '$rdate', '$genere', '$temp');";
                $query = mysqli_query($conn, $sql);

                if ($query){
                    echo 'done';
                    header('location: admin.php');
                }
                else{
                    echo 'failed';
                }
                    
               
            }
            ?>


            

    </body>


</html>