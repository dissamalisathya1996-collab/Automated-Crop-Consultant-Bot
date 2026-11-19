

<header>
	<div id='header';>
		<a href="index.php"><img src="Images/MovieHut-logo.png" width="100px" align="left"></a>

		

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
		<br>
		<form method="post" action="searchresult.php">
		<div class="searchbar">
			
            <input id="search" type="search" name="searchvalue" placeholder="  Search..."> 
			<button id="searchbutton" type="submit" name="searchbutton"><img src="Images/search_icon.png" width=18px></button>
			<?php 
				if (isset($_SESSION['user_id'])){
					if ($_SESSION['userlevel'] == 1){
						echo "<a href='admin.php' id='adminlink'>Admin</a>";
					}}
			?>
		</div>
		</form>
		
	</div> 
		
	</header>