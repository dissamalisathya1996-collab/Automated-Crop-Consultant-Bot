<header>
		<div id='header'>
		<a href="index.php"><img src="Images/image4.png" width="100px" align="left"></a>

		

		<div class="register" >
            <button id="signin" type="button" name="Sign In" onclick="document.getElementById('id01').style.display='block'">Sign In</button>
            <?php include "loginpopup.php"; ?>
			<br>
			 <a id="signup" href="registerform.php">Don't have an account?</a>
             
		</div>
		<br>
		<form method="post" action="searchresult.php">
		<div class="searchbar">
			
            <input id="search" type="search" name="searchvalue" placeholder="  Search..."> 
			<button id="searchbutton" type="submit" name="searchbutton"><img src="Images/search_icon.png" width=18px></button>
			
		</div>
		</form>
        
</div>	
	</header>