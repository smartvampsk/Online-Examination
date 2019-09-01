<?php
	if(!isset($_SESSION['user_logged'])){
		header('location:login');		
	}
?>

<section class="row pt-1 p-1">
	<div class="col-md-2"></div>
	<div class="col-md-8 pt-5 text-center">
		<h5>Hello, <b><?php echo $userProfile['username']; ?></b></h5>
		<h3>Welcome to</h3>
		<h3 class="">Online Examination System</h3>
		<h5><a href="profile">Visit: My Profile</a></h5>
	</div>
</section>