<?php
	if(!isset($_SESSION['student_logged'])){
		header('location:login');		
	}
?>

<section class="content-section pt-3">	
	<img class="img-fluid" src="../images/bg1.jpg">
	<div class="">
		<div class="row mb-3 ">
			<div class="col-md-5">
				<h3 class="pt-3 pb-2">Your Modules</h3>
				<ul>
					<?php 
						foreach ($modules as $module) {
							echo '<li class="pl-3"><a href="module?mId='.$module['module_id'].'">'.$module['module_code'].' - '.$module['module_name'].'</a></li>';
						}
					?>
				</ul>
			</div>
			<div class="col-md-2 ">	</div>
		</div>
		
		<div class="">
			<h4>About Us</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
		<div class="row">
			
		</div>
	</div>
</section>