<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="CSS/profile.css">
        <?php
            include "Includes/databaseconn.php";
            $userid = $_SESSION['user_id'];
            $sql = "SELECT * FROM users where userID = '$userid' ";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_array($query);
            $fname = $result['fname'];
            $lname = $result['lname'];
            $email = $result['email'];
            $phone = $result['phone'];
            $dtime = $result['date&time'];
            
            if(!isset($_SESSION['user_id'])){
                header("location: error.php");
            }

        ?>
        <title><?php echo $fname." ".$lname; ?></title>

    </head>

    <body>
        <?php include "Includes/commonheader.php" ?>

        <div id="push-content">
            
        </div>
        

        <div id="movies">
            <h3 id="uheader">Reserved Movies</h3>
            <table>
                    <tr>
                        <th>Movie</th>
                        <th>Date and Time</th>
                        
                        <th>Cancel Reservation</th>
                    </tr>
            <?php
                    
                    $sql2 = "SELECT * from rent WHERE user_ID='$userid'";
                    $query2 = mysqli_query($conn, $sql2);
                    if(!$query){
                        echo "error";
                    }

                    while($row = $query2->fetch_array()){
                        
                        
                            $movieid = $row['movie_ID'];
                            $rentid = $row['rent_id'];
                            $date = $row['rented_time'];
                            $sql3 = "SELECT * FROM movies WHERE movieid='$movieid'";
                            $query3 = mysqli_query($conn, $sql3);
                            if(!$query3){
                                echo "error 2";
                            }
                            $result = mysqli_fetch_array($query3);
                            $moviename = $result['moviename'];
                            


                            


                            $delete = "Includes/cancelreservation.php?id=$rentid";
                            echo "<tr><td>$moviename</td> <td>$date</td> <td><a href=$delete id='delete' style='text-decoration:none;'>Cancel</a></td></tr>";
                        
                    }
            ?>
            </table>


        </div>
        <div id="user">
            <h3 id="uheader">User Proile</h3>
            Name:<br>
            <?php echo $fname." ".$lname."<br>"; ?><br>
            Email:<br>
            <?php   echo $email."<br>"; ?><br>
            Mobile Number:<br>
            <?php   echo $phone."<br>"; ?><br>
            Account was created in:<br>
            <?php    echo $dtime."<br>"; ?>

            


        </div>

    

    </body>


</html>