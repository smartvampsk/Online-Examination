<!-- starting of html5 -->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
   		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- calling css -->
		<link rel="stylesheet" href="../css/style.css"/>
		<!-- title of the page -->
		<title> <?php echo $title; ?> </title>
	</head>
	<!-- body part of the page -->
	<body>
		<header class="nav-head">
		    <div class="container-fluid border-bottom p-2 upperBar border-secondary">
				<div class="row">
					<div class=" col-md-8">
						<a class="navbar-brand" href="home">
							<img src="../images/logo1.png" height="50" width="250" class="rounded d-inline-block align-top mr-0" alt="Online Assesment Logo">
						</a>
					</div>
					<div class="col-md-4">
						<ul class="list-unstyled mb-0 nav-top text-right">
							<li class="nav-item list-unstyled d-inline-block">
								<?php
									if (isset($_SESSION['student_logged'])) {
										echo '<a class="btn btn-outline-info text-white" href="logout">Logout</a>';
									}
									else{
										echo '<a class="btn btn-outline-info text-white" href="login">Login</a>';
									}
								?>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<nav class="navbar navbar-expand-lg navbar-light navbar-color">
		       <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		         <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		             <li class="nav-item active">
		                <a class="nav-link text-white" href="home">Home <span class="sr-only">(current)</span></a>
		             </li>
		             <li class="nav-item dropdown">
		                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Modules
		                </a>
		                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		                	<?php 
		                		require '../db/db.php';
								$user = $_SESSION['student_logged'];
								$modules = $pdo->prepare("SELECT * 
									FROM courses c 
									JOIN modules m
									ON c.course_id = m.course_id
									JOIN students s
									ON s.course = c.course_id
									WHERE s.student_id = '$user'
								");
								$modules->execute();

		                		foreach ($modules as $module) {
		                			echo '<a class="dropdown-item" href="module?mId='.$module['module_id'].'">'.$module['module_name'].'</a>';
		                		}
		                	?>
		                </div>
		             </li>
		              <li class="nav-item">
		                <a class="nav-link text-white" href="grade">Grades</a>
		             </li>
		             <li class="nav-item">
		                <a class="nav-link text-white" href="profile">Profile</a>
		             </li>
		             <li class="nav-item">
		                <a class="nav-link text-white" href="help">Help</a>
		             </li>
		          </ul>
		    </nav>


		</header>

		<main role="main" class="container-fluid">
			<?php echo $content; ?>
		</main>

		<!-- footer of the page -->
		<footer class="container-fluid pt-4 ">
			<div class="row lowerFooter">
				<div class="col-md-4 pt-2 ">
				   <ul class="foot-link list-unstyled text-left">
				      <li><a class="nav-link pb-0" href="about">About us</a></li>
				      <li><a class="nav-link pb-0" href="contact">Contact us</a></li>
				      <li><a class="nav-link pb-0" href="#">Achievements</a></li>
				   </ul>
				</div>
				<div class="col-md-4 pt-2">
					<ul class="foot-link list-unstyled text-left">
						<li class="nav-link pb-0">All Right Reserved</li>
						<li class="nav-link pb-0">2018 - <?php echo date('Y'); ?></li>
						<li class="nav-link pb-0">&copy;Northampton Online Assessment</li>
					</ul>
				</div>
				<div class="col-md-4 pt-2 ">
				   <ul class="foot-link list-unstyled text-left">
				    	<li><a class="nav-link pb-0" href="#">Feedback</a></li>
				    	<li><a class="nav-link pb-0" href="#">Privacy Policies</a></li>
				    	<li><a class="nav-link pb-0" href="#">Terms and Conditions</a></li>
				   </ul>
				</div>
			</div>
		</footer>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	</body>
</html>