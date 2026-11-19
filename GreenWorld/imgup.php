<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "movie_hut");


  // If upload button is clicked ...
if(isset($_POST['uploadbtn']))   
{
//image path to uploaded image
$target = "ToDissamali/".basename($_FILES['cover']['name']); 

$cover = $_FILES['cover']['name'];
    
$sql = "INSERT INTO imgupload(image) VALUES ('$cover')";

$right = $db->query($sql);
   
if((move_uploaded_file($_FILES['cover']['tmp_name'], $target)) && ($right==true))
{
    header("location:imgupload.php?success");
}
else
{
    header("location:imgupload.php?error");
}
}
?>