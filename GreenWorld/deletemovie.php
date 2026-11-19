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
            <h3>Movie Details</h3>

            <div>
                <table>
                    <tr>
                        <th>Movie ID</th>
                        <th>Movie Name</th>
                        <th>Year</th>
                        <th>Genere</th>
                        <th>Remaining DVDs</th>
                        <th>Update Stock</th>
                        <th>Remove Movie</th>
                    </tr>
                <?php
                    $sql = "SELECT * from movies ORDER BY movieid DESC";
                    $query = mysqli_query($conn, $sql);

                    while($row = $query->fetch_array()){
                        $movieid = $row['movieid'];
                        $moviename = $row['moviename'];
                        $year = $row['year'];
                        $genere = $row['genere'];
                        $stock = $row['stock'];
                        
                            $delete = "Includes/deletemovierecord.php?id=$movieid";
                            echo "<tr><td>$movieid</td> <td>$moviename</td> <td>$year</td><td>$genere</td><td>$stock</td><td><form action='Includes/updatemoviestock.php?key=$stock&id=$movieid' method='post'><input type='text' name='newstock'><input type='submit' value='Add' id='stock' name='update'></form></td><td><a href=$delete id='delete'>Delete</a></td></tr>";
                        
                    }

                    

                ?>
                </table>

            </div>

        </div>
    </body>
</html>
