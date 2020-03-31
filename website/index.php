<?php?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Yencik Photography</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
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
		<img class="picturesizz" src="img/portfolio/O copy.jpg">
		<div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
		  <h3>YENCIK PHOTOGRAPHY</h3>
		  <p><b>Insert Your Slogan Here!</b></p> 
		</div>
	  </div>
	  <div class="mySlides w3-display-container w3-center">
		<img class="picturesizz" src="img/portfolio/OOOO copy.jpg">
		<div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
		  <h3>YENCIK PHOTOGRAPHY</h3>
		  <p><b>INSERT YOUR SLOGAN HERE.</b></p>    
		</div>
	  </div>
	  <div class="mySlides w3-display-container w3-center">
		<img class="picturesizz" src="img/portfolio/OOOOOO copy.jpg">
		<div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
		  <h3>YENCIK PHOTOGRAPHY</h3>
		  <p><b>INSERT YOUR SLOGAN HERE.</b></p>    
		</div>
	  </div>

        <!-- The Services Section -->
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
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-camera fa-stack-1x fa-inverse"></i>
                    </span>

                </div>
                <div class="w3-third">
                    <p><b>Videography</b></p>
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-video fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="w3-third">
                    <p><b>Areial Photography</b></p>
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

            <!-- MATTERPORT -->
            <div class="w3-center w3-margin-bottom w3-padding-16 w3-container">
                <div class="matterport1">
                    <p>Take the 3D Tour for the location below. </p>
                    <p>You can view the location as a floor plan, like a doll house, or in a first person perspective! </p>
                    <iframe width='553' height='480' src='https://my.matterport.com/show/?m=XC3GVzwna7p' frameborder='1' allowfullscreen allow='vr'></iframe>
                </div>
            </div>

            <!--Project Stack 3x2-->
                <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
                    <div class="w3-third w3-margin-bottom">
                        <img src="img/portfolio/project1.jpg" alt="Project 1" style="width:100%" class="w3-hover-opacity">
                        <div class="w3-container w3-white">
                            <p><b>Project 1</b></p>
                            <p class="w3-opacity">Fri 27 Nov 2016</p>
                            <p>LOCATION, PA.</p>
                            <button class="w3-button w3-black w3-margin-bottom" name="project" id="project1" onclick="document.getElementById('showProject').style.display='block'">View Photos</button>
                        </div>
                    </div>
                    <div class="w3-third w3-margin-bottom">
                        <img src="img/portfolio/project2.jpg" alt="Project 2" style="width:100%" class="w3-hover-opacity">
                        <div class="w3-container w3-white">
                            <p><b>Project 2</b></p>
                            <p class="w3-opacity">Sat 28 Nov 2016</p>
                            <p>LOCATION, PA.</p>
                            <button class="w3-button w3-black w3-margin-bottom" id="project2" onclick="document.getElementById('showProject').style.display='block'">View Photos</button>
                        </div>
                    </div>
                    <div class="w3-third w3-margin-bottom">
                        <img src="img/portfolio/project3.jpg" alt="Project 3" style="width:100%" class="w3-hover-opacity">
                        <div class="w3-container w3-white">
                            <p><b>Project 3</b></p>
                            <p class="w3-opacity">Sun 29 Nov 2016</p>
                            <p>LOCATION, PA.</p>
                            <button class="w3-button w3-black w3-margin-bottom" id="project3" onclick="document.getElementById('showProject').style.display='block'">View Photos</button>
                        </div>
                    </div>
                    <div class="w3-third w3-margin-bottom">
                        <img src="img/portfolio/project4.jpg" alt="Project 4" style="width:100%" class="w3-hover-opacity">
                        <div class="w3-container w3-white">
                            <p><b>Project 4</b></p>
                            <p class="w3-opacity">Sun 29 Nov 2016</p>
                            <p>LOCATION, PA.</p>
                            <button class="w3-button w3-black w3-margin-bottom" id="project4" onclick="document.getElementById('showProject').style.display='block'">View Photos</button>
                        </div>
                    </div>
                    <div class="w3-third w3-margin-bottom">
                        <img src="img/portfolio/project5.jpg" alt="Project 5" style="width:100%" class="w3-hover-opacity">
                        <div class="w3-container w3-white">
                            <p><b>Project 5</b></p>
                            <p class="w3-opacity">Sun 29 Nov 2016</p>
                            <p>LOCATION, PA.</p>
                            <button class="w3-button w3-black w3-margin-bottom" id="project5" onclick="document.getElementById('showProject').style.display='block'">View Photos</button>
                        </div>
                    </div>
                    <div class="w3-third w3-margin-bottom">
                        <img src="img/portfolio/project6.jpg" alt="Project 6" style="width:100%" class="w3-hover-opacity">
                        <div class="w3-container w3-white">
                            <p><b>Project 6</b></p>
                            <p class="w3-opacity">Sun 29 Nov 2016</p>
                            <p>LOCATION, PA.</p>
                            <button class="w3-button w3-black w3-margin-bottom" id="project6" onclick="document.getElementById('showProject').style.display='block'">View Photos</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <!-- The About Section -->
    <div class="w3-container w3-padding-64" id="about">
        <h2 class="w3-center w3-border-bottom w3-border-light-grey w3-padding-16">ABOUT</h2>
        <p>
           <font size="+2"> This is your one stop Photography shop! <br>I offer a wide variety of services including: Ariel Pictures/ Videos, Interior/Exterior Pictures, Virtual Tours (Matterport), videos of events, Family Portraits, Senior Pictures etc. 
		   <br>You name it, and I can do it.
        </p>
    </div>

    <div class="w3-row w3-grayscale l3 m6 w3-margin-bottom">
        <div class="w3-third w3-container"></div>
        <div class="w3-third w3-container">
            <div class="w-3-row l3 m6 w3-margin-bottom">
                <img src="https://scontent.fagc1-2.fna.fbcdn.net/v/t1.0-9/25399087_268134593716046_9126094635152119454_n.jpg?_nc_cat=108&_nc_sid=7aed08&_nc_ohc=_Aal-AJVskcAX_Xu3xt&_nc_ht=scontent.fagc1-2.fna&oh=b4a8e83ad40e0d09fae267993e0256b6&oe=5EA74E8D" alt="John" style="width:100%">
                <h3 class="w3-center">Josh Yencik</h3>
                <p class="w3-opacity w3-center">CEO & Founder</p>
                <p></p>
            </div>
        </div>
        <div class="w3-third w3-container"></div>
    </div>
    <div id="ticketModal" class="w3-modal">
        <div class="w3-modal-content w3-animate-top w3-card-4">
            <header class="w3-container w3-dark-grey w3-center w3-padding-32">
                <span onclick="document.getElementById('ticketModal').style.display='none'"
                      class="w3-button w3-dark-grey w3-xlarge w3-display-topright">�</span>
                <h2 class="w3-wide"><i class="fa fa-suitcase w3-margin-right"></i>Services</h2>
            </header>
            <div class="wrap">
                <form>
                <p>Choose one of our packages!</p>
                <div class="grid-box">
                    <div class="grid-wrapper">
                        <div class="grid-card flex-card">
                            <div class="flex-item-top">
                                <h1>Package 1</h1>
                                <h2>$150</h2>
                            </div>
                            <div class="flex-item">
                                <ul>
                                    <li>Matterport 3D showcase</li>
                                    <li>vr capability</li>
                                    <li>measuring capability</li>
                                    <li>tour</li>
                                    <li>mattertags (up to 10)</li>
                                </ul>
                            </br>
                            </div>
                            <label class="btn-container">
                            <div class="">
                                <input type="radio" name="package_sel" value="package_1">
                                <span class="checkmark flex-col"></span>
                            </div>
                            </label>
                        </div>
                        <div class="grid-card flex-card">
                            <div class="flex-item-top">
                                <h1>Package 2</h1>
                                <h2>$200</h2>
                            </div>
                            <div class="flex-item">
                                <ul>
                                    <li>Matterport 3D showcase</li>
                                    <li>vr capability</li>
                                    <li>measuring capability</li>
                                    <li>tour</li>
                                    <li>25 professional pictures</li>
                                    <li>mattertags (up to 15)</li>
                                </ul>
                            </br>
                            </div>
                            <label class="btn-container">
                            <div class="">
                                <input type="radio" name="package_sel" value="package_1">
                                <span class="checkmark"></span>
                            </div>
                            </label>
                        </div>
                        <div class="grid-card flex-card">
                            <div class="flex-item-top">
                                <h1>Package 3</h1>
                                <h2>$320</h2>
                            </div>
                            <div class="flex-item">
                                <ul>
                                    <li>Matterport 3D showcase</li>
                                    <li>vr capability</li>
                                    <li>measuring capability</li>
                                    <li>tour</li>
                                    <li>25 professional pictures</li>
                                    <li>Drone video</li>
                                    <li>intererior video (+$50)</li>
                                    <li>up to 25 ariel pictures</li>
                                    <li>2d floor plans</li>
                                    <li>mattertags (up to 20)</li>
                                </ul>
                            </br>
                            </div>
                            <label class="btn-container">
                            <div class="">
                                <input type="radio" name="package_sel" value="package_1">
                                <span class="checkmark"></span>
                            </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="grid-wrapper">
                    <div class="grid-box">
                        <table>
                            <p>Add On:</p>
                            <tr>
                            <td><input type="checkbox" name="options" value="option1"></td>
                            <td>OPTION 1</td>
                            </tr>
                            <tr>
                            <td><input type="checkbox" name="options" value="option2"></td>
                            <td>OPTION 2</td>
                            </tr>
                        </table>
                    </div>
                    <div class="grid-box">
                        <table>
                            <p>A La Carte:</p>
                            <tr>
                            <td><input type="checkbox" name="options" value="option1"></td>
                            <td>OPTION 1</td>
                            </tr>
                            <tr>
                            <td><input type="checkbox" name="options" value="option2"></td>
                            <td>OPTION 2</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="grid-box">
                    <input class="w3-input w3-border" type="text" placeholder="Email*"></br>
                    <input class="w3-input w3-border" type="text" placeholder="Phone #*"></br>
                    <input class="w3-input w3-border" type="text" placeholder="Date/Date Range*"></br>
                    <input class="w3-input w3-border" type="text" placeholder="Service Address*">
                </div>
                <button class="w3-button w3-block w3-dark-grey w3-padding-16 w3-section w3-right">SCHEDULE <i class="fa fa-check"></i></button>
                <button class="w3-button w3-red w3-section" onclick="document.getElementById('ticketModal').style.display='none'">Close <i class="fa fa-remove"></i></button>
                </form>
            </div>
        </div>
    </div>
    
    <?php include 'gallery.php';?>
    <!--gallery--><!--
    <div id="showProject" class="w3-modal">-->
        <!--<span onclick="document.getElementById('project1').style.display='none'" class="w3-display-container">
        </span>--><!--
        <div class="w3-content w3-display-container" style="max-width:800px">

            <img class="myPortfolio" src="img/portfolio/B copy.jpeg" style="width:100%">
            <img class="myPortfolio" src="img/portfolio/BB copy.jpeg" style="width:100%">
            <img class="myPortfolio" src="img/portfolio/E copy.jpeg" style="width:100%">
            <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
                <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
                <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
                <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
                <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
                <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
            </div>
        </div>
    </div>-->

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
