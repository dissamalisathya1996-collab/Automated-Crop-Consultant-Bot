<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type='text/css' href='CSS/moviepage.css'>
        <?php
            $movieid = $_GET['key'];
            
            include "Includes/databaseconn.php";
            
            $sql = "SELECT * from upcoming_movies WHERE umid = '$movieid'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query);
            $image = '<a href="upcomingmoviepage.php"><img src="data:image/jpeg;base64,'.base64_encode( $row['umimage'] ).'"/ width="540px" height = "820px" .class="poster"></a>';
            
        

        ?>
        <title><?php echo $row['umname']; ?> </title>
    </head>
    <body>

        <?php include "includes/commonheader.php"; ?>
        <div id="push-content">

        </div>
        <div id="poster">
        <?php
            echo $image; 
        ?>
        </div>
        <div id='details'>
            <h3><?php echo $row['umname']; ?> </h3>
            <h4><?php echo $row['release_date']; ?></h4>
            <h4><?php echo $row['genere']; ?> <h4>
            

            
            
        </div>

    </body>



</html>
