<!-- starting of html5 -->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
   		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- calling css -->
		<link rel="stylesheet" href="../../css/style.css"/>
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/popper.min.js"></script>
		<!-- title of the page -->
		<title> <?php echo $title; ?> </title>
	</head>
	<!-- body part of the page -->
	<body>
		<header class="nav-head">
		    <div class="container-fluid border-bottom p-2 upperBar border-secondary">
				<div class="row">
					<div class="col-md-8 pl-4">
						<a class="navbar-brand" href="home">
							<img src="../../images/logo1.png" height="50" width="250" class="rounded d-inline-block align-top mr-0" alt="Online Assesment Logo">
						</a>
					</div>
					<div class="col-md-4">
						<ul class="list-unstyled mb-0 nav-top text-right">
							<li class="pr-2 pl-2 list-unstyled d-inline-block bg-info rounded"><?php echo date('D, dS M Y'); ?></li>
							<li class="pr-2 pl-2 d-inline-block bg-info rounded">
								<?php 
									require '../../db/db.php';
									if (isset($_SESSION['user_logged'])) {
										$logged_id = $_SESSION['user_logged'];
										$stmt = $pdo->prepare("SELECT * FROM tutors WHERE tutor_id = '$logged_id'");
										$stmt->execute();
										foreach ($stmt as $key) {
											echo 'Hi, '.$key['username'];
										}
									}
									
								?>
							</li>
							<li class=" d-inline-block">
								<?php 
									if (isset($_SESSION['user_logged'])) {
										echo '<a class="btn btn-info btn-sm text-white pl-3 pr-3" href="logout">Logout</a>';
									}
									else{
										echo '<a class="btn btn-info btn-sm text-white pl-3 pr-3" href="login">Login</a>';
									}
								?>
								
							</li>
						</ul>
					</div>
				</div>
			</div>
		</header>

		<main role="main" class="container-fluid pl-0">
			<div class="row">
				<?php require 'sidebar.php'; ?>

				<div class="col-md-9 pl-0 pr-0 ml-0">
					<div class="container-fluid heading_title text-white text-center">
						<h5 class="p-2">
							<?php echo $heading; ?>
						</h5>
					</div>
					<div class="container-fluid text-left">
						<?php
						if (!empty($message)) 
						{
							?>
								<div class=" p-2 bg-info alert alert-dismissible fade show">
									<?php echo $message ?>
									<button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true"><b>&times;</b></span>
									</button>
								</div>
							<?php
						}
						?>
					</div>
					
					<?php echo $content; ?>	
				</div>				
			</div>
		</main>

		<!-- footer of the page -->
		<footer class="lowerFooter p-1 border-top border-secondary text-center">
			<p class="mb-0">Northampton Online Assessment &copy;2018 - <?php echo date('Y'); ?></p>
			<!-- <div class="lowerFooter p-2 ml-0">
				
			</div> -->
		</footer>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	</body>
</html>