<?php
	if(!isset($_SESSION['user_logged'])){
		header('location:login');	
	}
?>
<section class="container pt-1">
	<div class="row mt-1">
		<div class="col-sm-8 pl-4 ml-2">
			<!-- <a class="btn btn-outline-info" href="view_module">View Module</a> -->
		</div>
	</div>

	<div class="mt-3 mb-3 col-md-8">
		<div class="border rounded mt-2 p-3">
			<form method="POST" action="">
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Select Course</label>
					<div class="col-sm-8">
						<select class="form-control" name="course" required>
							<?php 
								foreach ($courses as $course) {
									echo '<option value="' . $course['course_id'] . '">' . $course['title'] . '</option>';
								}
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Select Module</label>
					<div class="col-sm-8">
						<select class="form-control" name="module" required>
							<?php 
								foreach ($modules as $module) {
									echo '<option value="' . $module['module_id'] . '">' . $module['module_name'] . '</option>';
								}
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Class of</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="year" placeholder="eg: 2016/2017" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Level</label>
					<div class="col-sm-8">
						<select class="form-control" name="level" required>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>

						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Term</label>
					<div class="col-sm-8">
						<select class="form-control" name="term" required>
							<option value="term1">Term 1</option>
							<option value="term2">Term 2</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Question set name:</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="question_name" placeholder="eg: CSY1011-16-term1" required>
					</div>
				</div>
				<button type="submit" name="submit" class="btn btn-primary btn-lg mt-3 mb-3">Go</button>
			</form>
		</div>
	</div>
</section>