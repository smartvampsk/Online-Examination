<?php
	if(!isset($_SESSION['student_logged'])){
		header('location:login');		
	}
?>
<?php 
	require '../db/db.php';
	if (isset($_SESSION['mId'])) {
		$mId = $_SESSION['mId'];
	}
?>
<section class="container-fluid modules pt-3">
	<div class="row">
		<div class="col-md-2 rounded text-white sidebar-link sidebar-module">
			<?php require 'sidebar.php'; ?>		
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-7 pt-3 pb-2 border rounded">
			<?php 
				if (isset($_GET['swId'])) {
					echo '<h2>Submit Your Work</h2>';
					?>
					<form method="POST" enctype="multipart/form-data">
						<div class="form-group row col-md-9 pl-0 pt-3">
							<label class="col-sm-4 col-form-label">Assessment Title</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="title" placeholder="">
							</div>
						</div>
						<div class="form-group row col-md-9 pl-0">
							<label class="col-sm-4 col-form-label">Assessment File</label>
							<div class="col-sm-8">
								<input type="file" class="mt-1" name="assignmentfile" placeholder="">
							</div>
						</div>
						<input class="form-check-input ml-2" type="hidden" name="student_id" value="<?php echo $_SESSION['student_logged']; ?>">
						<input class="form-check-input ml-2" type="hidden" name="module_id" value="<?php echo $mId; ?>">
						<input type="submit" name="submitAssignment" value="Submit" class="btn btn-outline-info mb-3">
					</form>
					<?php
				}
				elseif (isset($_GET['sId'])){
					echo '<h2>Slides</h2>';
					echo "No Slide is available currently";
				}
				elseif (isset($_GET['eId'])) {
					echo '<h2>Examination</h2>';
					$qstnDetObj = new DatabaseProcess($pdo, 'question_detail');
					$qstns = $qstnDetObj->find('module', $mId);
					$countQstn = $qstns->rowCount();
					if ($countQstn > 0) {
						echo '<p>The available examination for this module is: </p>';
						foreach ($qstns as $qstn) {
							echo '<div class="row">';
								echo '<div class="col-sm-3">';
									echo '<p class="mt-1">'.$qstn['question_name'].'</p><br>';
								echo '</div>';
								echo '<div class="col-sm-3">';
									echo '<a class="btn mt-1 btn-outline-info" <a href="exam_question?eid='.$qstn['qd_id'].'">Start Test!</a>';
								echo '</div>';
							echo '</div>';
						}
					}
					else{
						echo '<p>Currently, there is no examination available for this module. </p>';
					}					
				}
				elseif (isset($_GET['mId'])) {
					$moduleObj = new DatabaseProcess($pdo, 'modules');
					$modules = $moduleObj->find('module_id', $mId);
					$user = $_SESSION['student_logged'];
					$std = $pdo->query("SELECT * FROM students WHERE student_id = '$user'")->fetch();
					foreach ($modules as $module) {
						echo '<p class="pt-2">Welcome <b>'.$std['firstname'].' '.$std['lastname'].'</b></p>';
						echo '<p>You are on module:- <b>'.$module['module_code'].' ('.$module['module_name'].')</b></p>';
					}
				}
			?>
		</div>
	</div>
</section>