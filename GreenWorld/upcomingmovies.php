<!DOCTYPE html>
<html>
    <head>
        <title>Upcoming Movies</title>
        <?php include "Includes/databaseconn.php"; ?>
        <link rel="stylesheet" type="text/css" href="CSS/showmovies.css">
        <link rel="stylesheet" type="text/css" href="CSS/showmoviesstyle.css">
        
        <style>
            body{
                margin: 0px;
                padding: 0px;
            }
            
            h3{
            color:white;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size:20px;
            }
        </style>
            
        </style>
    </head>
    <body>

    <?php include "Includes/commonheader.php"; ?>
    <div id="push-content">

    </div>

    <div id='allmov'>
    <h3> All Upcoming Movies</h3>

    <?php
    $sql = "SELECT * from upcoming_movies";
    $query = mysqli_query($conn, $sql);

    if ($query){
        
        while($row = $query->fetch_array()){
            include 'Includes/upcomingmoviebox.php';
        }
    }
    else{
        echo 'error';
}
    ?>
    </div>


    </body>


</html>