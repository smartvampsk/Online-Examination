<?php
	if(!isset($_SESSION['student_logged'])){
		header('location:login');		
	}
?>

<section class="pt-3 p-1">
	<div class="row mt-1 pb-3">
		<div class="col-md-2"> </div>
		<div class="col-sm-8">
			<div class="col-md-12 ">
				<h3 class="text-center">My Profile</h3>
			</div>
			
			<div class="border rounded mt-2 p-3">
				<form method="" action="">
					<input type="hidden" class="form-control" name="admin_id" value="<?php echo $userProfile['admin_id']; ?>">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Full Name</label>
						<div class="col-sm-8">
							<input type="text" class="form-control border-0" name="firstname" readonly="" value="<?php echo $userProfile['firstname'].' '.$userProfile['lastname']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Gender</label>
						<div class="col-sm-8">
							<input type="text" class="form-control border-0" name="firstname" readonly="" value="<?php 
								if ($userProfile['gender'] == 'M') {
									echo 'Male'; }
								else echo "Female";
							?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Date of Birth</label>
						<div class="col-sm-8">
							<input type="text" class="form-control border-0" name="dob" readonly="" value="<?php 
							if($userProfile['dob'] != '0000-00-00') { echo $userProfile['dob']; }
							else {echo 'N/A';} ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Contact</label>
						<div class="col-sm-8">
							<input type="text" class="form-control border-0" name="contact" readonly="" value="<?php echo $userProfile['contact']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Email</label>
						<div class="col-sm-8">
							<input type="text" class="form-control border-0" name="email" readonly="" value="<?php echo $userProfile['email']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Course</label>
						<div class="col-sm-8">
							<input type="text" class="form-control border-0" name="email" readonly="" value="<?php echo $userProfile['title']; ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Username</label>
						<div class="col-sm-8">
							<input type="text" class="form-control border-0" name="contact" readonly="" value="<?php echo $userProfile['username']; ?>">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>