<?php
	if(!isset($_SESSION['student_logged'])){
		header('location:login');		
	}
	$qd_id = $_GET['eid'];
?>

<section class="pt-3 p-1 container">
	<?php 
		if (!$questions->rowCount()>0) {
			echo '<h2>Exam Questions</h2>';
			echo '<p>Sorry there is no questions available in this set.</p>';
		}
		else { ?>
			<div class="content-header">
				<p><b>Information: </b> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				
				<div class="row mt-1">
					<div class="col-sm-8">
						<div class="row pl-5">
							<h6>Module: &nbsp;<i><?php echo $modules['module_name']; ?></i></h6>
						</div>
						<div class="row pl-5">
							
						</div>
						<div class="row pl-5">
							<?php
								$total = $questions->rowCount();
								echo 'Total Questions: '.$total;
							?>
						</div>
					</div>
					
					<div class="col-sm-4">
						<div class="row pl-5">
							<h6>Level: &nbsp;<i>First</i></h6>
						</div>
						<div class="row pl-5">
							<h6>Full Marks: &nbsp;<i>
							<?php
								require '../db/db.php';
								$stmt = $pdo->prepare("SELECT SUM(mark) AS total_marks FROM question WHERE qd_id = '$qd_id'");
								$marks = 0;
								$stmt->execute();
								foreach ($stmt as $key) {
									echo $key['total_marks'];
								}
							?></i></h6>
						</div>
					</div>
				</div><hr>
			</div>

			<div>
				<ol>
					<form class="form-group form-check" method="POST"> 
						<?php 
							$counter = 0;
							foreach ($questions as $question) {
							 	$counter++;
							 	$counter = strval($counter);
							 	?>
							 	<li class="">
						 			<div class="row">
						 				<div class="col-sm-10">
						 					<h5><?php echo $question['question']; ?></h5>
						 				</div>
						 				<div class="col-sm-2">
						 					<p><?php echo $question['mark'].' marks'; ?></p>
						 				</div>
						 			</div>
						 			<input class="form-check-input ml-2" type="hidden" name="<?php echo 'qd_id'.$counter; ?>" value="<?php echo $question['qd_id']; ?>">
						 			<input class="form-check-input ml-2" type="hidden" name="<?php echo 'q_id'.$counter; ?>" value="<?php echo $question['q_id']; ?>">
						 			<input class="form-check-input ml-2" type="hidden" name="<?php echo 'mark'.$counter; ?>" value="<?php echo $question['mark']; ?>">
						 			<input class="form-check-input ml-2" type="hidden" name="<?php echo 'correct'.$counter; ?>" value="<?php echo $question['correct']; ?>">
						 			<ul style="list-style: lower-alpha;">
						 				<li>
											<input class="form-check-input ml-2" type="radio" name="<?php echo 'solution'.$counter; ?>" value="<?php echo $question['opt1']; ?>">
						 					<label class="form-check-label pl-5"><?php echo $question['opt1']; ?></label>
						 				</li>
						 				<li>
						 					<input class="form-check-input ml-2" type="radio" name="<?php echo 'solution'.$counter; ?>" value="<?php echo $question['opt2']; ?>">
						 					<label class="form-check-label pl-5"><?php echo $question['opt2']; ?></label>
						 				</li>
						 				<li>
						 					<input class="form-check-input ml-2" type="radio" name="<?php echo 'solution'.$counter; ?>" value="<?php echo $question['opt3']; ?>">
						 					<label class="form-check-label pl-5"><?php echo $question['opt3']; ?></label>

										</li>
						 				<li>
						 					<input class="form-check-input ml-2" type="radio" name="<?php echo 'solution'.$counter; ?>" value="<?php echo $question['opt4']; ?>">
						 					<label class="form-check-label pl-5"><?php echo $question['opt4']; ?></label>
						 				</li>
						 			</ul>
							 	</li>
				 			<?php }
			 			?>
			 			<input class="form-check-input ml-2" type="hidden" name="qds_id" value="<?php echo $qd_id; ?>">
			 			<input type="hidden" name="counter" value=" <?php echo $counter; ?> ">
			 			<button type="submit" name="submit" class="btn btn-primary mt-3 mb-3">Submit</button>
			 		</form>
				</ol>
			</div>
	<?php } ?>
</section>
