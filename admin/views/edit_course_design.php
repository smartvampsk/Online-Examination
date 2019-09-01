<?php
	if(!isset($_SESSION['user_logged'])){
		header('location:login');		
	}
?>

<section class="container pt-1">
	<div class="mt-3 mb-3 col-md-8">
		<div class="border rounded mt-2 p-3">
			<form method="POST" action="">
				<input type="hidden" name="course_id" value="<?php echo $currentCourse['course_id']; ?>" />
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Course Level</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="level" value="<?php echo $currentCourse['level']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Course Title</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="title" value="<?php echo $currentCourse['title']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Credit Weights</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="credit" value="<?php echo $currentCourse['credit']; ?>">
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