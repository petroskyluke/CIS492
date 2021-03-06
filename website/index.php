<?php include_once 'inc/db_connect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hydro Hawk Photography</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
</head>
<body onload="resize()" onresize="resize()">
    <!-- Navbar -->
    <div class="w3-top">
        <div class="w3-bar w3-black w3-card">
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-padding-large">Hydro Hawk Photography</a>
            <a href="login.php" class="w3-bar-item w3-button w3-padding-large w3-right w3-hide-small">LOG IN</a>
            <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-right w3-hide-small">CONTACT</a>
            <a href="#services" class="w3-bar-item w3-button w3-padding-large w3-right w3-hide-small">SERVICES</a>
            <a href="#pricing" class="w3-bar-item w3-button w3-padding-large w3-right w3-hide-small">PRICING</a>
            <a href="#portfolio" class="w3-bar-item w3-button w3-padding-large w3-right w3-hide-small">PORTFOLIO</a>
            <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-right w3-hide-small">ABOUT</a>

        </div>
    </div>

    <!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
    <div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
        <a href="#about" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">ABOUT</a>
        <a href="#portfolio" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">PORTFOLIO</a>
        <a href="#pricing" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">PRICING</a>
        <a href="#services" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">SERVICES</a>
        <a href="#contact" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">CONTACT</a>
        <a href="login.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">LOG IN</a>
    </div>

	<!-- Slideshow and page introduction -->
	<div class="w3-content" style="max-width:3000px;">
	  <!-- Automatic Slideshow Images -->
	  <div class="mySlides w3-display-container w3-center">
		<img class="picturesizz" src="img/portfolio/O copy.jpg">
		<div class="w3-display-middle w3-container w3-text-white">
            <h2>HYDRO HAWK PHOTOGRAPHY</h2>
		</div>
	  </div>
	  <div class="mySlides w3-display-container w3-center">
		<img class="picturesizz" src="img/portfolio/OOOO copy.jpg">
		<div class="w3-display-middle w3-container w3-text-white">
            <h2>HYDRO HAWK PHOTOGRAPHY</h2>
		</div>
	  </div>
	  <div class="mySlides w3-display-container w3-center">
		<img class="picturesizz" src="img/portfolio/OOOOOO copy.jpg">
		<div class="w3-display-middle w3-container w3-text-white">
		    <h2>HYDRO HAWK PHOTOGRAPHY</h2>
		</div>
      </div>

      

    </div>
    <!-- The About Section -->
    <div class="w3-container w3-content w3-padding-32" style="max-width:800px" id="about">
        <div class="profile w3-center w3-margin-bottom">
            <h2 class="w3-center w3-border-bottom w3-border-black">ABOUT</h2></br>
            <p class="w3-left-align">This is your one stop photography shop!</br>
                I offer a wide variety of services including:</br></p>
            <p class="w3-left-align">&#8226 Ariel Pictures/Videos</br>
                &#8226 Interior/Exterior Pictures</br>
                &#8226 Virtual Tours (Matterport)</br>
                &#8226 Videos of Events</br>
                &#8226 Family Portraits</br>
                &#8226 Senior Pictures</br></p>
            <p class="w3-left-align">You name it, and I can do it.</br>
                Check out my portfolio, schedule a service, or contact me below!</p>
        </div>
        
    </div>
    <!-- The Portfolio Section -->
    <div class="w3-black" id="portfolio">
        <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
            <h2 class="w3-wide w3-center w3-border-bottom w3-border-light-grey">PORTFOLIO</h2>
            <p class="w3-opacity w3-center"><i>Check out our photography and videography services that we provide.</i></p><br>
            
            <!-- Youtube -->
            <div class="w3-center w3-margin-bottom w3-padding-16">
                <h3>Video Tour</h3>
                <p>Watch the video to see a video tour in action!</p>
                <div class="grid-wrapper-matt">
                    <div class="grid-item-matt">
                    <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/EcZh4zLwi94" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            <!-- MATTERPORT -->
            <div class="w3-center w3-margin-bottom w3-padding-16">
                <h3>Virtual Tour (Matterport)</h3>
                <p>Take the 3D Tour for the location below. </p>
                <p>You can view the location as a floor plan, like a doll house, or in a first person perspective! </p>
                <div class="grid-wrapper-matt">
                    <div class="grid-item-matt">
                        <iframe width='853' height='480' src='https://my.matterport.com/show/?m=yHHEPdGzESB' frameborder='1' allowfullscreen allow='vr'></iframe>
                    </div>
                    <div class="grid-item-matt">
                        <iframe width='853' height='480' src='https://my.matterport.com/show/?m=LjUHekPstAt' frameborder='1' allowfullscreen allow='vr'></iframe>
                    </div>
                </div>
            </div>

            <!--Project gallery Stack 3x2-->
            <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
                <div class="w3-center">
                    <h3>My Projects</h3>
                    <p>Check out some of my previous projects!</p>
                    <p><i>(Images not full resolution)</i></p>
                </div>
                <div class="w3-third w3-margin-bottom">
                    <img src="img/portfolio/project1/thumbnails/!cover.jpg" alt="Project 1" class="proj-img w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>Project 1</b></p>
                        <button class="w3-button w3-black w3-margin-bottom" id="project1" onclick="document.getElementById('showProject1').style.display='block'">View Photos</button>
                    </div>
                </div>
                <div class="w3-third w3-margin-bottom">
                    <img src="img/portfolio/project2/thumbnails/!cover.jpg" alt="Project 2" class="proj-img w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>Project 2</b></p>
                        <button class="w3-button w3-black w3-margin-bottom" id="project2" onclick="document.getElementById('showProject2').style.display='block'">View Photos</button>
                    </div>
                </div>
                <div class="w3-third w3-margin-bottom">
                    <img src="img/portfolio/project3/thumbnails/!cover.jpg" alt="Project 3" class="proj-img w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>Project 3</b></p>
                        <button class="w3-button w3-black w3-margin-bottom" id="project3" onclick="document.getElementById('showProject3').style.display='block'">View Photos</button>
                    </div>
                </div>
                <div class="w3-third w3-margin-bottom">
                    <img src="img/portfolio/project4/thumbnails/!cover.jpg" alt="Project 4" class="proj-img w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>Project 4</b></p>
                        <button class="w3-button w3-black w3-margin-bottom" id="project4" onclick="document.getElementById('showProject4').style.display='block'">View Photos</button>
                    </div>
                </div>
                <div class="w3-third w3-margin-bottom">
                    <img src="img/portfolio/project5/thumbnails/!cover.jpg" alt="Project 5" class="proj-img w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>Project 5</b></p>
                        <button class="w3-button w3-black w3-margin-bottom" id="project5" onclick="document.getElementById('showProject5').style.display='block'">View Photos</button>
                    </div>
                </div>
                <div class="w3-third w3-margin-bottom">
                    <img src="img/portfolio/project6/thumbnails/!cover.jpg" alt="Project 6" class="proj-img w3-hover-opacity">
                    <div class="w3-container w3-white">
                        <p><b>Project 6</b></p>
                        <button class="w3-button w3-black w3-margin-bottom" id="project6" onclick="document.getElementById('showProject6').style.display='block'">View Photos</button>
                    </div>
                </div>                
            </div>
            <?php include 'gallery.php';?>

                
        </div>
    </div>
    <!--princing section-->
    <?php include 'pricing.php';?>

<div class="w3-white">
    <div class="w3-content">
        <!-- The Services Section -->
        <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="services">
            <h2 class="w3-wide w3-border-bottom w3-border-black">SERVICES</h2>
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
            
            <button class="schedulebtn w3-button w3-black w3-margin-bottom" onclick="document.getElementById('ticketModal').style.display='block'">Schedule an appointment</button>
            
        </div>
    </div>
    </div>

    <!-- modal used to schedule a service -->
    <div id="ticketModal" class="w3-modal">
        <div class="w3-modal-content w3-animate-top w3-card-4">
            <header class="w3-container w3-dark-grey w3-center w3-padding-32">
                <span onclick="document.getElementById('ticketModal').style.display='none'"
                      class="w3-button w3-dark-grey w3-xlarge w3-display-topright">
                      <i class="far fa-window-close"></i>
                    </span>
                <h2 class="w3-wide"><i class="fa fa-suitcase w3-margin-right"></i>Schedule a service!</h2>
            </header>
            <?php include 'showserviceform.php';?>
        </div>
    </div>


    <!-- The Contact Section -->
    <div class="w3-container w3-content w3-padding-32" style="max-width:800px" id="contact">
        <div class="profile w3-center w3-margin-bottom">
            <img src="img/profile/joshprofile.jpg" alt="Josh">
            <h3 class="w3-center">Josh Yencik</h3>
            <p class=" w3-center">CEO & Founder</p>
        </div>
        <h2 class="w3-wide w3-center w3-border-bottom w3-border-black">CONTACT</h2>
        <!--<p class="w3-opacity w3-center"><i>Fan? Drop a note!</i></p>-->
        <div class="w3-row w3-padding-32">
            <div class="w3-col m6 w3-large w3-margin-bottom">
                <i class="fa fa-map-marker" style="width:30px"></i> Greensburg, US<br>
                <i class="fa fa-phone" style="width:30px"></i> Phone: (724) 970-9235<br>
                <i class="fa fa-envelope" style="width:30px"> </i> Email: hydrohawkllc@gmail.com<br>
            </div>
            <div class="w3-col m6">
                <form action="send_message.php" method="post">
                    <div class="w3-row-padding" style="margin:0 -16px 0px -16px">
                        <div class="w3-half">
                            <input class="w3-input w3-border" style="margin: 0 16px 8px 0px;"type="text" placeholder="Name" required name="Name">
                        </div>
                        <div class="w3-half">
                            <input class="w3-input w3-border" style="margin: 0 16px 8px 0px;" type="text" placeholder="Phone" required name="Phone">
                        </div>
                    </div>
                    <div class="w3-row-padding" style="margin:0 -8px 8px -8px">
                        <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
                    </div>
                    <div class="w3-row-padding" style="margin:0 -8px 0px -8px">
                        <textarea class="w3-input w3-border"rows = "5" cols = "50" placeholder="Message" name = "Message"></textarea>
                    </div>
                    <button class="w3-button w3-black w3-section w3-right" type="submit">SEND MESSAGE</button>
                </form>
            </div>
        </div>
    </div>

    <!-- End Page Content -->

    <!-- Footer -->
    <footer class="w3-container w3-padding-64 w3-light-grey my-footer">
    <h3>This website was designed, developed, and implemented by Brian Kaufman, Luke Petrosky, and Kristopher Stewart
     as part of a senior project at California University of Pennsylvania
     </h3>
    </footer>

    <script>
        // Automatic Slideshow - change image every few seconds
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
            setTimeout(carousel, 7000);
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
        var gallery = document.getElementById('showProject1');
        var gallery2 = document.getElementById('showProject2');
        var gallery3 = document.getElementById('showProject3');
        var gallery4 = document.getElementById('showProject4');
        var gallery5 = document.getElementById('showProject5');
        var gallery6 = document.getElementById('showProject6');
        window.onclick = function (event) {
            if (event.target == modal || event.target == gallery|| event.target == gallery2
            || event.target == gallery3|| event.target == gallery4|| event.target == gallery5|| event.target == gallery6) {
                modal.style.display = "none";
                gallery.style.display = "none";
                gallery2.style.display = "none";
                gallery3.style.display = "none";
                gallery4.style.display = "none";
                gallery5.style.display = "none";
                gallery6.style.display = "none";
            }
        }


		//figure out how to do this by class instead of id, consider loading towards beginning of page instead of end
		function resize(){
            if(window.innerWidth<600){
                var scale = 1;
                //on screen widths smaller than 600px make carousel take up whole page
            }
            else{
                var scale = 1.5;
                //on screen widths lager than 600px make carousel scale 1.5X smaller
            }
			var w = window.innerWidth/scale;
			var h = window.innerHeight/scale;
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

        function plusDivs(n,g) {
            showDivs(slideIndex += n,g);
        }

        function showDivs(n,g) {
            var omg="myPortfolio"+g;
            var i;
            var x = document.getElementsByClassName(omg);
            if (n > x.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = x.length }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex - 1].style.display = "block";
        }
    </script>

</body>
</html>
