<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="./css/collaps.css">
	<script src="./js/collapse.js"></script>
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/fontawesome-all.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
	    crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
	    crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
		crossorigin="anonymous"></script>
	
		<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html {
        height: 100%;
        margin: 0;
        padding: 0;
		text-align: center;
      }

      #map {
        height: 500px;
        width: 1000px;
      }
    </style>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar fixed-top navbar-dark" style="background-color: #ff6a38">
		<a class="navbar-brand" href="index.php">IT Rent System</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynavbar" aria-controls="mynavbar" aria-expanded="false"
		    aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="mynavbar">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item active">
				</li>
				<li class="nav-item">
				</li>
				<li class="nav-item">
				</li>
			</ul>
			<form class="form-inline">
				<p class="mt-2"> Welcome ::
					<strong><?php echo $_SESSION['username']; ?></strong>
				</p>&nbsp;&nbsp;&nbsp;&nbsp;
			</form>
			<a href="index.php?logout='1'" style="font-size:15px; color:#000000;">
				<i class="fas fa-sign-out-alt"></i>Log out</a>
		</div>
	</nav>
	<!--nav-collapse-->
	<nav class="navbar-primary">
	<a href="#" class="btn-expand-collapse">
		<i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
	</a>
	<ul class="navbar-primary-menu nav-tabs">
		<li>
			<a onclick="location.href='index.php'">
				<i class="fas fa-search-plus"></i>
				<span class="nav-label">Search And Borrow</span>
			</a>
			<a onclick="location.href='renew.php'">
			<i class="far fa-calendar-alt"></i>
				<span class="nav-label">Renew Item</span>
			</a>
			<a onclick="location.href='invent.php'">
			<i class="fas fa-history"></i>
				<span class="nav-label">Inventory</span>
			</a>
			<a href="">
            <i class="fas fa-phone-volume"></i>
				<span class="nav-label">Contact us</span>
			</a>
		</li>
	</ul>
	<!--some script for collapsing-->
	<script>
		$('.btn-expand-collapse').click(function (e) {
			$('.navbar-primary').toggleClass('collapsed');
		});
	</script>
	<!--/some script for collapsing-->
</nav>
        <div class="content">
            <div class="col-12">
                <div class="row">
					<div id="map"></div>
				</div>
				<hr>
				<h3>About Me</h3>
			<p>Creator : Theerapong Liamdee</p>
			<p>Subject : Web Application</p>
            </div>
        </div>
</body>
<script>
      function initMap() {
			var mapOptions = {
			  center: {lat: 17.817578, lng: 102.737291},
			  zoom: 16,
			  mapTypeId:google.maps.MapTypeId.HYBRID
			}
				
			var maps = new google.maps.Map(document.getElementById("map"),mapOptions);
			
			var marker = new google.maps.Marker({
			   position: new google.maps.LatLng(17.817578, 102.737291),
			   map: maps,
			   title: 'มข วนค',
			   icon: '/img/red-icon.png',
			});

			var info = new google.maps.InfoWindow({
				content : '<div style="font-size: 25px;color: red">There Is My Location หอพัก มณียา</div>'
			});

			google.maps.event.addListener(marker, 'click', function() {
				info.open(maps, marker);
			});
		}
    </script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcS06LDeKlwA8_CaCzAF7aGIVmTcIHWU4&callback=initMap" async defer></script>

</html>