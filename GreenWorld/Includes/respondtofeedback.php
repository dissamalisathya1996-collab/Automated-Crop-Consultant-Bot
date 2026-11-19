<?php
    $mail = $_GET['email'];
    
?>


<form action='respondtofeedback.php?email=<?php echo $mail; ?>' method='POST' id='form'>
    Enter your message here: <br>
    <textarea rows='4' name='message' form='form'></textarea><br>
    <input type='submit' name = 'send' value='send'>


</form>
<?php
include 'databaseconn.php';



if(isset($_POST['send'])){
    $message = $_POST['message'];
    $email = $_GET['email'];
    


    $sent = mail($email, 'Movie Hut',$message, 'from: moviehut@fastmail.com');
    if($mail){
        header('location: ../userfeedback.php');
    }
   

    }


?>

