<head><style>
    #push-content{
	background: #4f326e;
    width: 100%;
    height: 50px;
    border:  solid transparent;
    padding: 0px;
    margin: 0px;
    }
    .movielink{
        text-decoration:none;
        color: white;
    }
    .movielink:hover{
        color:grey;
    }
    #smoviebox{
        margin-left:20px;
        margin-top:20px;
        width:260px;
        float:left;
        display:inline block;
    }
    body{
    background-color: #0c0d21;

    }
    h3{
            color:white;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size:20px;
            
        }



</style></head>

<?php


if (isset($_POST['searchbutton'])){
    $value = $_POST['searchvalue'];

    include "Includes/databaseconn.php";
    include "Includes/commonheader.php";
    echo "<div id='push-content'>

    </div>";
    echo "<h3> Search Results</h3>";

    $sql = "SELECT * FROM movies WHERE moviename LIKE '%$value%'";
    $query = mysqli_query($conn, $sql);

    while($row = $query->fetch_array()){
        echo "<div id='smoviebox'>";
        $movieid = $row['movieid'];
        $link = "moviepage.php?key=$movieid";
        $other = '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/ width="270px" height = "410px" .class="poster"></a>';
        $image = "<a href=$link>$other";
        echo $image;
        
        $moviename = $row['moviename'];
        $year = $row['year'];
        
        echo "<a href=$link class='movielink'>$moviename($year)</a>";
        echo "</div>";
    }
}


?>