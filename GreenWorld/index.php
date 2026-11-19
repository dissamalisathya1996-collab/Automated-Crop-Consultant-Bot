<!DOCTYPE html>
<html>
<head>
	<title>GreenWorld - A good farmer never plants all his seeds in a single piece of land</title>


	

	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Slider</title>
    
    <link rel="stylesheet" type="text/css" href="CSS/showmoviesindex.css">
    <link rel="stylesheet" type="text/css" href="./CSS/index.css">
    <link rel="stylesheet" type="text/css" href="CSS/imgslider.css">
    <!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<link href="css/mislider.css" rel="stylesheet" type="text/css" />
<link href="css/mislider-custom.css" rel="stylesheet" type="text/css" />
<!-- font-awesome-icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->

   

<!-- js -->

</head>
<body>
	
    <?php 
    include "Includes/databaseconn.php";
    include 'Includes/loggedin.php';
    if (logged_in()){
        include "Includes/loggedinheader.php";
    }
    else{
        include 'Includes/header.php'; 
    }
    ?>
    <div id="push-content">

    </div>

       <!-- Image Slider -->
       <section id="slider-container">
        <!-- slides -->
            <div class="slide fade" id="slide-0">
                <img src="./images/image1.jpg" alt="First Image">
            </div>
            <div class="slide fade" id="slide-1">
                <img src="./images/image2.jpg" alt="Second Image">
            </div>
            <div class="slide fade" id="slide-2">
                <img src="./images/image3.jpg" alt="Third  Image">
            </div>
            <!-- arrow navigation -->
            <div id="arrows-wrapper" class="">
                <!-- arrow left -->
                <p class="slider-arrow center_y" id="arrow-prev">&#10094</p>
                <!-- arrow right -->
                <p class="slider-arrow center_y" id="arrow-next">&#10095</p>
            </div>
            <!-- dot navigation -->
            <div id="dots-wrapper" class="center_x">
                <div class="dot-navigation"></div>
                <div class="dot-navigation"></div>
                <div class="dot-navigation"></div>
            </div>
        </section>

        <!-- scripts -->
        <script src="./scripts/index.js"></script>
         




    <div class="page-body">

        <h3 id="latestmov">Welcome To Our Plantation</h3>
        <br>

        <div class="mis-stage w3_agileits_welcome_grids"> 
			<!-- The element to select and apply miSlider to - the class is optional -->
			<ol class="mis-slider">
				<li class="mis-slide"> 
					<figure> 
						<img src="images/2.png" alt=" " class="img-responsive" />
						<figcaption>Strawberry</figcaption>
					</figure>
				</li>
				<li class="mis-slide"> 
					<figure> 
						<img src="images/3.png" alt=" " class="img-responsive" />
						<figcaption>Orange</figcaption>
					</figure>
				</li>
				<li class="mis-slide"> 
					<figure> 
						<img src="images/4.png" alt=" " class="img-responsive" />
						<figcaption>Pomegranates</figcaption>
					</figure>
				</li>
				<li class="mis-slide"> 
					<figure> 
						<img src="images/5.png" alt=" " class="img-responsive" />
						<figcaption>Lemon</figcaption>
					</figure>
				</li>
				<li class="mis-slide"> 
					<figure> 
						<img src="images/6.png" alt=" " class="img-responsive" />
						<figcaption>Kiwi Fruits</figcaption>
					</figure>
				</li>
				<li class="mis-slide"> 
					<figure> 
						<img src="images/7.png" alt=" " class="img-responsive" />
						<figcaption>Apples</figcaption>
					</figure>
				</li>
			</ol>
		</div>
	</div>
	 
  
        <h3 id="latestmov">Latest News From Plantation</h3>
        <br>
        <a href="imgupload.php">Upload Image</a>

    </div>
    <div>
    <?php include "includes/footer.php"; ?>  
    </div>  

</body>
</html>