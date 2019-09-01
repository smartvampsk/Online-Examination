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
						<input type="hidden" class="form-control" name="qd_id" value="<?php echo $currentQuestionName['qd_id']; ?>">
						<input type="text" class="form-control" name="question_name" required="" readonly=""  value="<?php echo $currentQuestionName['question_name']; ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Question Type</label>
					<div class="col-sm-8">
						<select class="form-control" name="type" required>
							<option value="r">Objective - One Answer (Radio Option)</option>
							<option value="c">Objective - Multiple Answer (Checkbox)</option>
							<option value="s">Subjective</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Question</label>
					<div class="col-sm-8">
						<textarea class="form-control" name="question" required></textarea>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Option 1</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="opt1" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Option 2</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="opt2" required>
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Option 3</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="opt3" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Option 4</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="opt4" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Correct answer</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="correct" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Marks</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="mark" required>
					</div>
				</div>

				
				<div class="form-group d-flex justify-content-between">
					<button type="submit" name="next" class="btn btn-primary btn-lg mt-3 mb-3">Next</button>
					<a class="btn btn-danger btn-lg mt-3 mb-3" href="add_question_home">Finish</a>
				</div>
			</form>
		</div>
		</div>
	</div>
	<div class="row col-md-8 mb-3">
		<div class="container heading_title text-white text-center">
			<h5 class="p-1">Recently Added Question</h5>
		</div>
		<div class="col-sm-12 pl-0 pt-3">
			<a class="btn btn-sm btn-outline-info" href="">View All</a>
		</div>
		<div class="container mt-3 border">
			<ul class="list-unstyled pt-1">
				<?php 
					echo '<li class="font-weight-bold">Question</li>';
					echo '<li class="pl-4">'.$currentQuestion['question'].'</li>';
					echo '<li class="font-weight-bold">Option 1</li>';
					echo '<li class="pl-4">'.$currentQuestion['opt1'].'</li>';
					echo '<li class="font-weight-bold">Option 2</li>';
					echo '<li class="pl-4">'.$currentQuestion['opt2'].'</li>';
					echo '<li class="font-weight-bold">Option 3</li>';
					echo '<li class="pl-4">'.$currentQuestion['opt3'].'</li>';
					echo '<li class="font-weight-bold">Option 4</li>';
					echo '<li class="pl-4">'.$currentQuestion['opt4'].'</li>';
					echo '<li class="font-weight-bold">Correct Answer</li>';
					echo '<li class="pl-4">'.$currentQuestion['correct'].'</li>';
					echo '<li class="font-weight-bold">Marks</li>';
					echo '<li class="pl-4">'.$currentQuestion['mark'].'</li>';
				?>
			</ul>
		</div>
		
		<!-- <table class="table table-sm mt-2">
			<thead class="thead-light">
				<tr>
					<th scope="col">S.N</th>
					<th scope="col">Question</th>
					<th scope="col">Option 1</th>
					<th scope="col">Option 2</th>
					<th scope="col">Option 3</th>
					<th scope="col">Option 4</th>
					<th scope="col">Correct Answer</th>
					<th scope="col">marks</th>
				</tr>
			</thead>
			<tbody>
				<?php
					// $sn = 1;
					// 	echo '<tr>';
					// 	echo '<td>'.$sn++.'</td>';
					// 	echo '<td>'.$currentQuestion['question'].'</td>';
					// 	echo '<td>'.$currentQuestion['opt1'].'</td>';
					// 	echo '<td>'.$currentQuestion['opt2'].'</td>';
					// 	echo '<td>'.$currentQuestion['opt3'].'</td>';
					// 	echo '<td>'.$currentQuestion['opt4'].'</td>';
					// 	echo '<td>'.$currentQuestion['correct'].'</td>';
					// 	echo '<td>'.$currentQuestion['mark'].'</td>';

					// 	// echo '<td>'.$question['level'].'</td>';
					// 	// echo '<td>'.$question['course_id'].'</td>';
					// 	// echo '<td>
					// 	// 		<a class="btn btn-sm btn-success" href="edit_module?eid=' . $module['module_id'].'">Edit</a>
					// 	// 		<a class="btn btn-sm btn-danger" href="view_module?delId=' . $module['module_id'].'">Delete</a>
					// 	// 	</td>';
					// 	echo '</tr>';
				?>
			</tbody>
		</table> -->
	</div>
</section>