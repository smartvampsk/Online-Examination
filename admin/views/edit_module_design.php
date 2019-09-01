<?php
	if(!isset($_SESSION['user_logged'])){
		header('location:login');		
	}
?>

<section class="container pt-1">
	<div class="row mt-1">
		<div class="col-sm-8 pl-4 ml-2">
			<a class="btn btn-outline-info" href="view_module">View Module</a>
		</div>
	</div>

	<div class="mt-3 mb-3 col-md-8">
		<div class="border rounded mt-2 p-3">
			<form method="POST" action="">
				<input type="hidden" name="module_id" value="<?php echo $currentModule['module_id']; ?>" />
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Module Name</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="module"  value="<?php echo $currentModule['module_name']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Module Code</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="code" value="<?php echo $currentModule['module_code']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Module Credit</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="credit" value="<?php echo $currentModule['credit']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Select Course</label>
					<div class="col-sm-8">
						<select class="form-control" name="course" value="<?php echo $currentModule['course_id']; ?>">
							<?php
								require '../../db/db.php';

								$currentCours = $pdo->prepare('SELECT * FROM courses');
								$currentCours->execute();
								foreach ($currentCours as $currentCourse) {
									if ($currentModule['course_id'] == $currentCourse['course_id']) {
										echo '<option selected="selected" value="' . $currentCourse['course_id'] . '">' . $currentCourse['title'] . '</option>';
									}
									else {
										echo '<option value="' . $currentCourse['course_id'] . '">' . $currentCourse['title'] . '</option>';
									}
								}
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Select Level</label>
					<div class="col-sm-8">
						<select class="form-control" name="level" value="<?php echo $currentModule['level']; ?>">
							<option>1</option>
							<option>2</option>
							<option>3</option>
						</select>
					</div>
				</div>

				<div class="form-group d-flex justify-content-between">
					<button type="submit" name="update" class="btn btn-primary btn-lg mt-3 mb-3">Update</button>
					<button type="submit" name="cancel" class="btn btn-danger btn-lg mt-3 mb-3">Cancel</button>
				</div>

			</form>
		</div>
	</div>
</section>