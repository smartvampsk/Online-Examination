<?php
	if(isset($_SESSION['user_logged'])){
		header('location:index.php');		
	}

?>

<section class="container pt-1 pb-4" style="height: 500px;">
	<div class="row">
		<div class="col-md-3">
			<legend class="pt-1 pb-1 mr-5 border-bottom">Log In</legend>
		</div>

		<div class="col-md-6">
			<img class="login-img" src="../../images/user.png">
			<div class="container border rounded pt-5">
				<form method="POST" action="" class="pt-5">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Username</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="username">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Password</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" name="password">
						</div>
					</div>
					<button type="submit" name="submit" class="btn btn-primary mt-3 mb-3">Login</button>
					<small class="text-muted"><a class="pl-3" href="">Forget Password?</a></small>
				</form>
			</div>
		</div>
	</div>
</section>