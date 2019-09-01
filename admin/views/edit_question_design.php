<?php
	if(!isset($_SESSION['user_logged'])){
		header('location:login');		
	}
?>
<section class="container pt-1">
	<div class="row">
		<div class="mt-3 mb-3 col-md-8">
			<div class="border rounded mt-2 p-3">
			<form method="POST" action="">
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Question Set Name</label>
					<div class="col-sm-8">
						<input type="hidden" class="form-control" name="qd_id" value="<?php echo $currentQuestion['qd_id']; ?>">
						<input type="hidden" class="form-control" name="q_id" value="<?php echo $currentQuestion['q_id']; ?>">
						<input type="text" class="form-control" name="question_name" required="" readonly=""  value="<?php echo $currentQuestionName['question_name']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Question</label>
					<div class="col-sm-8">
						<textarea class="form-control" name="question"> <?php echo $currentQuestion['question']; ?> </textarea>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Option 1</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="opt1" value="<?php echo $currentQuestion['opt1']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Option 2</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="opt2" value="<?php echo $currentQuestion['opt2']; ?>">
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Option 3</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="opt3" value="<?php echo $currentQuestion['opt3']; ?>">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Option 4</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="opt4" value="<?php echo $currentQuestion['opt4']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Correct answer</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="correct" value="<?php echo $currentQuestion['correct']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Marks</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="mark" value="<?php echo $currentQuestion['mark']; ?>">
					</div>
				</div>

				<div class="form-group d-flex justify-content-between">
					<button type="submit" name="update" class="btn btn-primary btn-lg mt-3 mb-3">Update</button>
					<a class="btn btn-danger btn-lg mt-3 mb-3" href="<?php echo 'view_question_set?vId='.$currentQuestion['qd_id'].''; ?>">Cancel</a>
				</div>
			</form>
		</div>
		</div>
	</div>
</section>