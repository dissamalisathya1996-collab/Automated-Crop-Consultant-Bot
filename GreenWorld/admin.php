<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type='text/css' href='CSS/admin.css'>
        <title>Admin</title>
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
            <h3>User Details</h3>

            <div>
                <table>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Reserved Movies</th>
                        <th>Remove user</th>
                        <th>Make an Admin</th>
                    </tr>
                <?php
                    $sql = "SELECT * from users ORDER BY userID DESC";
                    $query = mysqli_query($conn, $sql);

                    

                    while($row = $query->fetch_array()){
                        
                        $isadmin = $row['user_level'];
                        if($isadmin == 0){
                            $id = $row['userID'];
                            $fname = $row['fname'];
                            $lname = $row['lname'];

                            $sql2 = "SELECT movie_ID FROM rent WHERE user_ID = '$id'";
                            $query2 = mysqli_query($conn, $sql2);
                            $array = [];
                            while($row2 = $query2->fetch_array()){
                                array_push($array, $row2['movie_ID']);
                            }
                            $len = sizeof($array);
                            $moviearray = [];
                            for($i = 0; $i<$len;$i++){
                                $sql3 = "SELECT moviename FROM movies WHERE movieid=$array[$i]";
                                $query3 = mysqli_query($conn, $sql3);
                                $row3 = mysqli_fetch_array($query3);
                                array_push($moviearray, $row3['moviename']);
                            }
                            $len2 = sizeof($moviearray);
                            if ($len2 == 2 ){
                                $reservedmovies = "$moviearray[0], $moviearray[1]";
                            }
                            else if($len2 == 1){
                                $reservedmovies = "$moviearray[0]";
                            }
                            else{
                                $reservedmovies = "No movies reserved";
                            }
                            $promote = "Includes/makeanadmin.php?key=$id";

                            
                            $delete = "Includes/deleteuserrecord.php?id=$id";
                            echo "<tr><td>$id</td> <td>$fname $lname</td> <td>$reservedmovies</td><td><a href=$delete id='delete'>Delete</a></td><td><a href=$promote>Promote</a></td></tr>";
                        }
                    }

                    

                ?>
                </table>

            </div>

        </div>
    </body>
</html>
