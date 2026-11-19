<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type='text/css' href='CSS/admin.css'>
        <title>Remove Movies</title>
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

            <div>
                <table>
                    <tr>
                        <th>Upcoming Movie ID</th>
                        <th>Movie Name</th>
                        <th>Release Date</th>
                        <th>Genere</th>
                        <th>Remove Movie</th>
                    </tr>
                <?php
                    $sql = "SELECT * from upcoming_movies ORDER BY umid DESC";
                    $query = mysqli_query($conn, $sql);

                    while($row = $query->fetch_array()){
                        $movieid = $row['umid'];
                        $moviename = $row['umname'];
                        $releasedate = $row['release_date'];
                        $genere = $row['genere'];
                        
                        
                            $delete = "Includes/deletemovierecord.php?id=$movieid";
                            echo "<tr><td>$movieid</td> <td>$moviename</td> <td>$releasedate</td><td>$genere</td><td><a href=$delete id='delete'>Delete</a></td></tr>";
                        
                    }

                    

                ?>
                </table>

            </div>

        </div>
    </body>
</html>
