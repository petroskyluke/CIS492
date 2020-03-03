
<?php



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Yencik Photography</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <style>
        body {
            font-family: "Lato", sans-serif
        }

        .mySlides {
            display: none
        }
    </style>
</head>
<body onload="resize()" onresize="resize()">
    <!-- Navbar -->
    <div class="w3-top">
        <div class="w3-bar w3-black w3-card">
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-padding-large">YENCIK PHOTOGRAPHY</a>
            <a href="login.php" class="w3-bar-item w3-button w3-padding-large w3-right w3-hide-small">LOG IN</a>
            <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-right w3-hide-small">CONTACT</a>
            <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-right w3-hide-small">ABOUT</a>
            <a href="#portfolio" class="w3-bar-item w3-button w3-padding-large w3-right w3-hide-small">PORTFOLIO</a>
            <a href="#services" class="w3-bar-item w3-button w3-padding-large w3-right w3-hide-small">SERVICES</a>

        </div>
    </div>

    <!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
    <div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
        <a href="#services" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">SERVICES</a>
        <a href="#portfolio" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">PORTFOLIO</a>
        <a href="#about" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">ABOUT</a>
        <a href="#contact" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">CONTACT</a>
        <a href="login.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">LOG IN</a>
    </div>



	<!-- Page content -->
	<div class="w3-content" style="max-width:3000px;">

	  <!-- Automatic Slideshow Images -->
	  <div class="mySlides w3-display-container w3-center">
		<!--<img src="img/nikon.jpg" style="width:100%; height:100%; object-fit:cover">-->
		<!--test image with resolution of 6014x4000-->
		<img class="picturesizz" src="img/nikon.jpg">
		<div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
		  <h3>YENCIK PHOTOGRAPHY</h3>
		  <p><b>Insert Your Slogan Here!</b></p> 
echo '<a href="http://www.website.com/page.html">Click here</a>';		  
		</div>
	  </div>
	  <div class="mySlides w3-display-container w3-center">
		<img class="picturesizz" src="img/header-bg2.jpg">
		<div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
		  <h3>YENCIK PHOTOGRAPHY</h3>
		  <p><b>INSERT YOUR SLOGAN HERE.</b></p>    
		</div>
	  </div>
	  <div class="mySlides w3-display-container w3-center">
		<img class="picturesizz" src="img/test2.jpg">
		<div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
		  <h3>YENCIK PHOTOGRAPHY</h3>
		  <p><b>INSERT YOUR SLOGAN HERE.</b></p>    
		</div>
	  </div>

        <!-- The Services Section -->
		<!--</br></br><p id="demoo"></p>-->

        <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="services">
            <h2 class="w3-wide">SERVICES</h2>
            <p class="w3-opacity"><i>Select a requested service and date to set up our service.</i></p>
            <!-- we can put something in here if we want
              <p class="w3-justify">We have created a fictional band website. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
              ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur
              adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> -->
            <div class="w3-row w3-padding-32">
                <div class="w3-third">
                    <p><b>Photography</b></p>
                    <!-- if you want a real picture
                        <img src="/w3img/bandmember.jpg" class="w3-round w3-margin-bottom" alt="Random Name" style="width:60%">
                    -->
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-camera fa-stack-1x fa-inverse"></i>
                    </span>

                </div>
                <div class="w3-third">
                    <p><b>Videography</b></p>
                    <!-- if you want a real picture
                        <img src="/w3img/bandmember.jpg" class="w3-round w3-margin-bottom" alt="Random Name" style="width:60%">
                    -->
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-video fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="w3-third">
                    <p><b>Areial Photography</b></p>
                    <!-- if you want a real picture
                        <img src="/w3img/bandmember.jpg" class="w3-round" alt="Random Name" style="width:60%">
                    -->
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-helicopter fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
            </div>
            <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('ticketModal').style.display='block'">Schedule</button>
        </div>

    </div>

    <!-- The Portfolio Section -->
    <div class="w3-black" id="portfolio">
        <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
            <h2 class="w3-wide w3-center w3-border-bottom w3-border-light-grey">PORTFOLIO</h2>
            <p class="w3-opacity w3-center"><i>Check out our photography and videography services that we provide.</i></p><br>

<iframe width='853' height='480' src='https://my.matterport.com/show/?m=XC3GVzwna7p' frameborder='0' allowfullscreen allow='vr'></iframe>
<iframe width='853' height='480' src='https://my.matterport.com/show/?m=gjqdS14vMja' frameborder='0' allowfullscreen allow='vr'></iframe>

            <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
                <div class="w3-third w3-margin-bottom">
                    <img src="img/portfolio/project1.jpg" alt="Project 1" style="width:100%" class="w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>Project 1</b></p>
                        <p class="w3-opacity">Fri 27 Nov 2016</p>
                        <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
                        <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('showProject').style.display='block'">View Photos</button>
                    </div>
                </div>
                <div class="w3-third w3-margin-bottom">
                    <img src="img/portfolio/project2.jpg" alt="Project 2" style="width:100%" class="w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>Project 2</b></p>
                        <p class="w3-opacity">Sat 28 Nov 2016</p>
                        <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
                        <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('showProject').style.display='block'">View Photos</button>
                    </div>
                </div>
                <div class="w3-third w3-margin-bottom">
                    <img src="img/portfolio/project3.jpg" alt="Project 3" style="width:100%" class="w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>Project 3</b></p>
                        <p class="w3-opacity">Sun 29 Nov 2016</p>
                        <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
                        <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('showProject').style.display='block'">View Photos</button>
                    </div>
                </div>
                <div class="w3-third w3-margin-bottom">
                    <img src="img/portfolio/project4.jpg" alt="Project 4" style="width:100%" class="w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>Project 4</b></p>
                        <p class="w3-opacity">Sun 29 Nov 2016</p>
                        <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
                        <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('showProject').style.display='block'">View Photos</button>
                    </div>
                </div>
                <div class="w3-third w3-margin-bottom">
                    <img src="img/portfolio/project5.jpg" alt="Project 5" style="width:100%" class="w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>Project 5</b></p>
                        <p class="w3-opacity">Sun 29 Nov 2016</p>
                        <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
                        <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('showProject').style.display='block'">View Photos</button>
                    </div>
                </div>
                <div class="w3-third w3-margin-bottom">
                    <img src="img/portfolio/project6.jpg" alt="Project 6" style="width:100%" class="w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>Project 6</b></p>
                        <p class="w3-opacity">Sun 29 Nov 2016</p>
                        <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
                        <button class="w3-button w3-black w3-margin-bottom" onclick="document.getElementById('showProject').style.display='block'">View Photos</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- The About Section -->
    <div class="w3-container w3-padding-64" id="about">
        <h2 class="w3-center w3-border-bottom w3-border-light-grey w3-padding-16">ABOUT</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint
            occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
            laboris nisi ut aliquip ex ea commodo consequat Maybe have image pull from facebook profile?
        </p>
    </div>

    <div class="w3-row w3-grayscale l3 m6 w3-margin-bottom">
        <div class="w3-third w3-container"></div>
        <div class="w3-third w3-container">
            <div class="w-3-row l3 m6 w3-margin-bottom">
                <img src="https://scontent.fewr1-6.fna.fbcdn.net/v/t1.0-1/p320x320/84606452_1845874482211653_1591730745506791424_o.jpg?_nc_cat=106&_nc_ohc=8FHq2dh6gEkAX8oLsZu&_nc_ht=scontent.fewr1-6.fna&_nc_tp=6&oh=4986601ae56492e007afa2f4a81eaceb&oe=5EBA5B69" alt="John" style="width:100%">
                <h3 class="w3-center">Josh Yencik</h3>
                <p class="w3-opacity w3-center">CEO & Founder</p>
                <p></p>
            </div>
        </div>
        <div class="w3-third w3-container"></div>
    </div>

    <!-- old code><div class="w3-row-padding w3-grayscale">
        <div class="w3-col w3-center l3 m6 w3-margin-bottom">
            <img src="https://scontent.fewr1-6.fna.fbcdn.net/v/t1.0-1/p320x320/84606452_1845874482211653_1591730745506791424_o.jpg?_nc_cat=106&_nc_ohc=8FHq2dh6gEkAX8oLsZu&_nc_ht=scontent.fewr1-6.fna&_nc_tp=6&oh=4986601ae56492e007afa2f4a81eaceb&oe=5EBA5B69" alt="John" style="width:100%">
            <h3>Josh Yencik</h3>
            <p class="w3-opacity">CEO & Founder</p>
            <p></p>
        </div>
    </div>-->
    <!-- Ticket Modal -->
    <div id="ticketModal" class="w3-modal">
        <div class="w3-modal-content w3-animate-top w3-card-4">
            <header class="w3-container w3-dark-grey w3-center w3-padding-32">
                <span onclick="document.getElementById('ticketModal').style.display='none'"
                      class="w3-button w3-dark-grey w3-xlarge w3-display-topright">×</span>
                <h2 class="w3-wide"><i class="fa fa-suitcase w3-margin-right"></i>Services</h2>
            </header>
            <div class="w3-container">
                <p><label><i class="fa fa-building"></i> Name</label></p>
                <input class="w3-input w3-border" type="text" placeholder="Name/Company Name*">
                <p><label><i class="fa fa-user"></i> Contact Info</label></p>
                <input class="w3-input w3-border" type="text" placeholder="Email*">
                <input class="w3-input w3-border" type="text" placeholder="Phone #*">
                <p><label><i class="fa fa-camera"></i> Service Info</label></p>
                <input class="w3-input w3-border" type="text" placeholder="Date/Date Range*">
                <input class="w3-input w3-border" type="text" placeholder="Service(s) Required*">
                <p><label><i class="fa fa-location-arrow"></i> Location</label></p>
                <input class="w3-input w3-border" type="text" placeholder="Service Address*">

                <button class="w3-button w3-block w3-dark-grey w3-padding-16 w3-section w3-right">SCHEDULE <i class="fa fa-check"></i></button>
                <button class="w3-button w3-red w3-section" onclick="document.getElementById('ticketModal').style.display='none'">Close <i class="fa fa-remove"></i></button>
            </div>
        </div>
    </div>

    <!--gallery-->
    <div id="showProject" class="w3-modal">
        <span onclick="document.getElementById('showProject').style.display='none'" class="w3-display-container">
        </span>
        <div class="w3-content w3-display-container" style="max-width:800px">

            <img class="myPortfolio" src="img/portfolio/project6.jpg" style="width:100%">
            <img class="myPortfolio" src="img/portfolio/project5.jpg" style="width:100%">
            <img class="myPortfolio" src="img/portfolio/project4.jpg" style="width:100%">
            <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
                <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
                <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
                <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
                <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
                <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
            </div>
        </div>
    </div>

    <!-- The Contact Section -->
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
        <h2 class="w3-wide w3-center">CONTACT</h2>
        <!--<p class="w3-opacity w3-center"><i>Fan? Drop a note!</i></p>-->
        <div class="w3-row w3-padding-32">
            <div class="w3-col m6 w3-large w3-margin-bottom">
                <i class="fa fa-map-marker" style="width:30px"></i> Greensburg, US<br>
                <i class="fa fa-phone" style="width:30px"></i> Phone: (724) 970-9235<br>
                <i class="fa fa-envelope" style="width:30px"> </i> Email: joshyencikphotography@gmail.com<br>
            </div>
            <div class="w3-col m6">
                <form action="/action_page.php" target="_blank">
                    <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                        <div class="w3-half">
                            <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
                        </div>
                        <div class="w3-half">
                            <input class="w3-input w3-border" type="text" placeholder="Phone" required name="Phone">
                        </div>
                    </div>
                    <div class="w3-row-padding" style="margin:0 -8px 8px -8px">
                        <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
                    </div>
                    <div class="w3-row-padding" style="margin:0 -8px 0px -8px">
                        <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message">
                    </div>
                    <button class="w3-button w3-black w3-section w3-right" type="submit">SEND MESSAGE</button>
                </form>
            </div>
        </div>
    </div>

    <!-- End Page Content -->
    <!-- Image of location/map
    <img src="/w3img/map.jpg" class="w3-image w3-greyscale-min" style="width:100%">-->
    <!-- Footer -->
    <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge"></footer>

    <script>
        // Automatic Slideshow - change image every 4 seconds
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) { myIndex = 1 }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 8000);
        }

        // Used to toggle the menu on small screens when clicking on the menu button
        function myFunction() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }

        // When the user clicks anywhere outside of the modal, close it
        var modal = document.getElementById('ticketModal');
        var gallery = document.getElementById('showProject');
        window.onclick = function (event) {
            if (event.target == modal || event.target == gallery) {
                modal.style.display = "none";
                gallery.style.display = "none";
            }
        }


		//figure out how to do this by class instead of id, consider loading towards beginning of page instead of end
		function resize(){
			var w = window.innerWidth;
			var h = window.innerHeight;
			//document.getElementById("demoo").innerHTML = "Width: " + w + "<br>Height: " + h;
			var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
				x[i].getElementsByClassName("picturesizz")[0].style.width=w+"px";
				x[i].getElementsByClassName("picturesizz")[0].style.height=h+"px";
				x[i].getElementsByClassName("picturesizz")[0].style.objectFit="cover";
            }
		}

        //Project Gallery Looping
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
            showDivs(slideIndex += n);
        }

        function currentDiv(n) {
            showDivs(slideIndex = n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("myPortfolio");
            var dots = document.getElementsByClassName("demo");
            if (n > x.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = x.length }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" w3-white", "");
            }
            x[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " w3-white";
        }
    </script>

</body>
</html>
