<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type='text/css' href='CSS/moviepage.css'>
        <?php
            $movieid = $_GET['key'];
            
            include "Includes/databaseconn.php";
            
            $sql = "SELECT * from movies WHERE movieid = '$movieid'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query);
            $image = '<a href="moviepage.php"><img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/ width="540px" height = "820px" .class="poster"></a>';
            
        

        ?>
        <title><?php echo $row['moviename']; ?> </title>
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
            <h3><?php echo $row['moviename']; ?> </h3>
            <h4><?php echo $row['year']; ?></h4>
            <h4><?php echo $row['genere']; ?> <h4>
            <h4>Availability: <?php
             if ($row['stock']>0){
                $stock = $row['stock'];
                echo "$stock DVDs available";
            }
            else{
                echo "There're no DVDs available";
            }
            ?>
            </h4>

            <?php if(isset($_SESSION['user_id'])){
                include "Includes/reservebutton.php";
            }
            ?>
        </div>

    </body>



</html>
