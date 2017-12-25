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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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
				<p class="mt-2"> Renew Your Item ::
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
			<a href="">
			<i class="fas fa-retweet"></i>
				<span class="nav-label">Renew Item</span>
			</a>
			<a onclick="location.href='invent.php'">
			<i class="fas fa-history"></i>
				<span class="nav-label">Inventory</span>
			</a>
			<a onclick="location.href='contact.php'">
				<<i class="fas fa-phone-volume"></i>
				<span class="nav-label">Contact Us</span>
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
				<div class="col-md-12 mt-2">
					<h3>Welcome :
						<strong>
							<?php echo $_SESSION['username']; ?>
						</strong>
					</h3>
					<hr>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Search</span>
							<input type="text" name="sch_txt" id="sch_txt" placeholder="Search For Your Item" class="form-control" />
						</div>
					</div>
					<br>
					<div id="renew_result">
					</div>
				</div>
			</div>
		</div>
</body>
</html>
<script>
$(document).ready(function () {

load_data();

function load_data(sql_query) {
	$.ajax({
		url: "fetch4.php",
		method: "POST",
		data: {
			sql_query: sql_query
		},
		success: function (data) {
			$('#renew_result').html(data);
		}
	});
}
$('#sch_txt').keyup(function () {
	var search = $(this).val();
	if (search != '') {
		load_data(search);
	} else {
		load_data();
	}
});
});
</script>
</script>