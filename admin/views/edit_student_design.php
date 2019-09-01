<?php
	if(!isset($_SESSION['user_logged'])){
		header('location:login');		
	}
?>

<section class="container pt-1">
	<div class="row mt-1">
		<div class="col-sm-8 pl-4 ml-2">
			<a class="btn btn-outline-info" href="view_student">View Students</a>
		</div>
	</div>

	<div class="mt-3 mb-3 col-md-8">
		<legend class="pt-1 pb-1">Enter student's information</legend>
		<div class="border rounded mt-2 p-3">
			<form method="POST" action="">
				<input type="hidden" name="student_id" value="<?php echo $currentStudent['student_id']; ?>" />
				<h5 class="pl-0 ml-0">Personal Information</h5><hr>
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Firstname</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="firstname" value="<?php echo $currentStudent['firstname']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Surname</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="surname" value="<?php echo $currentStudent['lastname']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Gender</label>
					<div class="col-sm-8">
						<input type="radio" class="ml-1" value="M" name="gender" checked="">
						<label>Male</label>
						<input type="radio" class="ml-2" value="F" name="gender" <?php if ($currentStudent['gender'] == 'F') {
								echo 'checked';
							} ?>>
						<label>Female</label>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Date of Birth</label>
					<div class="col-sm-8">
						<input type="date" class="form-control" name="dob" value="<?php echo $currentStudent['dob']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Contact</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="contact" value="<?php echo $currentStudent['contact']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Email</label>
					<div class="col-sm-8">
						<input type="email" class="form-control" name="email" value="<?php echo $currentStudent['email']; ?>">
					</div>
				</div><br>

				<h5>Course Information</h5><hr>
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Course</label>
					<div class="col-sm-8">
						<select class="form-control" name="course">
							<?php
								foreach ($courses as $course) {
									if ($currentStudent['course'] == $course['course_id']) {
										echo '<option selected="selected" value="' . $course['course_id'] . '">' . $course['title'] . '</option>';
									}
									else {
										echo '<option value="' . $course['course_id'] . '">' . $course['title'] . '</option>';
									}
								}
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Level</label>
					<div class="col-sm-8">
						<select class="form-control" name="level" >
							<option>4</option>
							<option>5</option>
							<option>6</option>
						</select>
					</div>
				</div><br>

				<h5>Sign Up</h5><hr>
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Username</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="username" value="<?php echo $currentStudent['username']; ?>">
					</div>
				</div>

				<div class="form-group d-flex justify-content-between">
					<button type="submit" name="update" class="btn btn-primary btn-lg mt-3 mb-3">Update</button>
					<button type="submit" name="cancel" class="btn btn-danger btn-lg mt-3 mb-3">Cancel</button>
				</div>
			</form>
		</div>
		</div>
	</div>
</section>