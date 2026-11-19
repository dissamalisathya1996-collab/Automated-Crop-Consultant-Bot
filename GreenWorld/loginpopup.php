<link rel="stylesheet" type="text/css" href="CSS/login.css">
<div id="id01" class="modal">
  <form class="modal-content animate" method="post" action="login.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="Images/person.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label  for="uname">Email</label>
      <input type="text" placeholder="Enter Username" name="email" required>

      <label align="right" for="psw">Password</label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit">Sign In</button>
      
      
    </div>

    
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

