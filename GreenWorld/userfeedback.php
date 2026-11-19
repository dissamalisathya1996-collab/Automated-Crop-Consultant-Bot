<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type='text/css' href='CSS/admin.css'>
        <title>User Feedback</title>
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
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Comment</th>
                        <th>satisfaction scale</th>
                        <th>feedback scale</th>
                        <th>Respond</th>
                    </tr>
                <?php
                    $sql = "SELECT * from feedback";
                    $query = mysqli_query($conn, $sql);

                    while($row = $query->fetch_array()){
                        $userid = $row['userid'];
                        $sql2 = "SELECT * FROM users WHERE userid = $userid";
                        $query2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_array($query2);
                        $fname = $row2['fname'];
                        $lname = $row2['lname'];
                        $comment = $row['comment'];
                        $ss = $row['q1'];
                        $fs = $row['q2'];
                        $email = $row2['email'];

                        $respond = "<a href='Includes/respondtofeedback.php?email=$email'>Respond</a>";
   
                        echo "<tr><td>$userid</td> <td>$fname $lname</td> <td>$comment</td><td>$ss</td><td>$fs</td><td>$respond</td></tr>";
                        
                    }

                    

                ?>
                </table>

            </div>

        </div>
    </body>
</html>
