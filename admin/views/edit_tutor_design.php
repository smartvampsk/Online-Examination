<?php
	if(!isset($_SESSION['user_logged'])){
		header('location:login');		
	}
?>

<section class="container pt-1">

	<div class="mt-3 mb-3 col-md-8">
		<legend class="pt-1 pb-1">Enter tutors information</legend>
		<div class="border rounded mt-2 p-3">
			<form method="POST" action="">
				<input type="hidden" name="tutor_id" value="<?php echo $currentTutor['tutor_id']; ?>" />
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Firstname</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="firstname" required value="<?php echo $currentTutor['firstname']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Surname</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="surname" required value="<?php echo $currentTutor['lastname']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Gender</label>
					<div class="col-sm-8">
						<input type="radio" class="ml-1" name="gender" value="M" checked="">
						<label>Male</label>
						<input type="radio" class="ml-2" name="gender" value="F">
						<label>Female</label>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Date of Birth</label>
					<div class="col-sm-8">
						<input type="date" class="form-control" name="dob" value="<?php echo $currentTutor['dob']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Contact</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="contact" value="<?php echo $currentTutor['contact']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Email</label>
					<div class="col-sm-8">
						<input type="email" class="form-control" name="email" required value="<?php echo $currentTutor['email']; ?>"> 
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Role</label>
					<div class="col-sm-8">
						<select class="form-control" name="role" required>
							<option value="P">Admin</option>
							<option value="N">Normal</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Specialized Module</label>
					<div class="col-sm-8">
						<select class="form-control" name="subject" >
							<?php
								foreach ($modules as $module) {
									if ($currentTutor['subject'] == $module['module_id']) {
										echo '<option selected="selected" value="' . $module['module_id'] . '">' . $module['module_name'] . '</option>';
									}
									else {
										echo '<option value="' . $module['module_id'] . '">' . $module['module_name'] . '</option>';
									}
								}
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Username</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="username" value="<?php echo $currentTutor['username']; ?>">
					</div>
				</div>

				<!-- <div class="form-group row">
					<label class="col-sm-4 col-form-label">Password</label>
					<div class="col-sm-8">
						<input type="password" class="form-control" name="password" >
					</div>
				</div> -->

				<div class="form-group d-flex justify-content-between">
					<button type="submit" name="update" class="btn btn-primary btn-lg mt-3 mb-3">Update</button>
					<button type="submit" name="cancel" class="btn btn-danger btn-lg mt-3 mb-3">Cancel</button>
				</div>
			</form>
		</div>
		</div>
	</div>
</section>