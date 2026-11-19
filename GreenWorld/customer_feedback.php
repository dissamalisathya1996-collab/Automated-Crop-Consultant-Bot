<!DOCTYPE html>
<html>

<head>
  <title>customer feed back survey</title>
  <link rel="stylesheet" href="CSS/feedback.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
  <?php
   include 'Includes/databaseconn.php'; 
   include 'Includes/loggedin.php';

   if (!logged_in()){
      header("location: error.php");
   }

   $userid = $_SESSION['user_id'];
   $sql = "SELECT * FROM users WHERE userid = '$userid'";
   $query = mysqli_query($conn, $sql);
   $row = mysqli_fetch_array($query);

   
   ?>
</head>

<body id="app">
  <div class="container">
    <header>
      <h1 id="title">Customer Feedback</h1>
    </header>
    <main>
      <p id="description"><?php echo $row['fname'].", ";   ?>Please let us know about your experience with our website.</p>
      <form action="customer_feedback.php" id="survey-form" method="POST">

        

        <p class="survey-question">Q: How satisfied are you with our website overall?</p>
        <ul class="feedback-choice">
          <li>
            <input type="radio" name="satisfaction-scale" id="satisfaction-scale-5" value="satisfaction-scale-5">
            <label for="satisfaction-scale-5">Very satisfied</label>
          </li>

          <li>
            <input type="radio" name="satisfaction-scale" id="satisfaction-scale-4" value="satisfaction-scale-4">
            <label for="satisfaction-scale-4">Somewhat satisfied</label>
          </li>

          <li>
            <input type="radio" name="satisfaction-scale" id="satisfaction-scale-3" value="satisfaction-scale-3">
            <label for="satisfaction-scale-3">Satisfied</label>
          </li>

          <li>
            <input type="radio" name="satisfaction-scale" id="satisfaction-scale-2" value="satisfaction-scale-2">
            <label for="satisfaction-scale-2">Neither satisfied nor dissatisfied</label>
          </li>

          <li>
            <input type="radio" name="satisfaction-scale" id="satisfaction-scale-1" value="satisfaction-scale-1">
            <label for="satisfaction-scale-1">Not satisfied</label>
          </li>
        </ul>

        <p class="survey-question">Q: Which of the following words would you use to describe our website? (check all that apply)</p>
        <ul class="feedback-choice">
          <li>
            <input type="checkbox" name="feedback-scale[0]" id="feedback-scale-1" value="feedback-scale-1">
            <label for="feedback-scale-1">Reliable</label>
          </li>

          <li>
            <input type="checkbox" name="feedback-scale[1]" id="feedback-scale-2" value="feedback-scale-2">
            <label for="feedback-scale-2">Highquality</label>
          </li>

          <li>
            <input type="checkbox" name="feedback-scale[2]" id="feedback-scale-3" value="feedback-scale-3">
            <label for="feedback-scale-3">Useful</label>
          </li>

          <li>
            <input type="checkbox" name="feedback-scale[3]" id="feedback-scale-4" value="feedback-scale-4">
            <label for="feedback-scale-4">Good value for money</label>
          </li>

          <li>
            <input type="checkbox" name="feedback-scale[4]" id="feedback-scale-5" value="feedback-scale-5">
            <label for="feedback-scale-5">Overpriced</label>
          </li>

          <li>
            <input type="checkbox" name="feedback-scale[5]" id="feedback-scale-6" value="feedback-scale-6">
            <label for="feedback-scale-6">Poor quality</label>
          </li>
        </ul>
        <p class="survey-question">Please list any comments or suggestions you have</p>
        <p class="comments"><textarea name="comments" id="comments" cols="35" rows="4" placeholder="Enter your feedback here ..."></textarea></p>
        <p><input type="submit" value="Submit" id="submit" class="submit-btn" name='submit'></p>

      </form>
    </main>
  </div>

  <?php 
  if(isset($_POST['submit'])){
    $q1 = $_POST['satisfaction-scale'];
    echo $q1;
    for($i=0;$i<6;$i++){
      $feedback[$i] = isset($_POST['feedback-scale'][$i]) ? 1 : 0;
    }
    $comment = $_POST['comments'];
    $q2 = $feedback[0].",".$feedback[1].",".$feedback[2].",".$feedback[3].",".$feedback[4].",".$feedback[5];
    $sql1 = "INSERT INTO feedback (feedbackid, userid, q1, q2, comment) VALUES(null, '$userid','$q1','$q2','$comment')";
    $query1 = mysqli_query($conn, $sql1);
    header('location: index.php');
    
  }
  ?>

</body>

</html>