<header>
	<div id='header';>
		<a href="index.php"><img src="Images/image4.png" width="100px" align="left"></a>

		

		<div class="register" >
			<?php
			$conn = mysqli_connect('localhost', 'root', '');
			$db= mysqli_select_db($conn, 'movie_hut');
			$userid = $_SESSION['user_id'];
			$sql = "SELECT fname FROM users where userID = '$userid' ";
			$query = mysqli_query($conn,$sql);
			$result = mysqli_fetch_array($query);
			$username =  $result['fname'];
			echo "<a href='profile.php' id='profile'>$username</a>";
            ?>
            <br>
            <a href='logout.php' id="logout">Logout</a> 
		</div>
		
	</div> 
		
	</header>