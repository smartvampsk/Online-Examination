<?php
	if(!isset($_SESSION['user_logged'])){
		header('location:login');		
	}
?>

<section class="container pt-1">
	<div class="row mt-1">
		<div class="col-sm-8 pl-4 ml-2">
		</div>
	</div>

	<?php
		require '../../db/db.php';
		if (isset($_POST['submitModule'])) {
			$mId = $_POST['module'];
			$informations = $pdo->prepare("SELECT *
				FROM marks mr
				JOIN question_detail qd
				ON mr.qd_id = qd.qd_id
				JOIN students s 
				ON mr.student_id = s.student_id
				JOIN modules m 
				ON m.module_id = qd.module
				JOIN courses c 
				ON m.course_id = c.course_id
				WHERE qd.module = $mId
				ORDER BY s.firstname ASC
				");
			$informations->execute();
	?>
		<table class="table table-sm">
			<thead class="thead-light">
				<tr>
					<th scope="col">S.N</th>
					<th scope="col">Full Name</th>
					<th scope="col">Module</th>
					<th scope="col">Question Set</th>
					<th scope="col">Marks</th>
					<th scope="col">Operation</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sn = 1;
					foreach ($informations as $student) {
						echo '<tr>';
						echo '<td>'.$sn++.'</td>';
						echo '<td>'.$student['firstname'].' '.$student['lastname'].'</td>';
						echo '<td>'.$student['module_name'].'</td>';
						echo '<td>'.$student['question_name'].'</td>';
						echo '<td>'.$student['marks'].'</td>';
						echo '<td>
								<a class="btn btn-sm btn-danger" href="view_report?delId=' . $student['mark_id'].'">Delete</a>
							</td>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	<?php }
		elseif (isset($_POST['submitStudent'])) {
			$sId = $_POST['student'];
			$informations = $pdo->prepare("SELECT *
				FROM marks mr
				JOIN question_detail qd
				ON mr.qd_id = qd.qd_id
				JOIN students s 
				ON mr.student_id = s.student_id
				JOIN modules m 
				ON m.module_id = qd.module
				JOIN courses c 
				ON m.course_id = c.course_id
				WHERE mr.student_id = $sId
				ORDER BY s.firstname ASC
				");
			$informations->execute();
	?>
		<table class="table table-sm">
			<thead class="thead-light">
				<tr>
					<th scope="col">S.N</th>
					<th scope="col">Full Name</th>
					<th scope="col">Module</th>
					<th scope="col">Question Set</th>
					<th scope="col">Marks</th>
					<th scope="col">Operation</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sn = 1;
					foreach ($informations as $student) {
						echo '<tr>';
						echo '<td>'.$sn++.'</td>';
						echo '<td>'.$student['firstname'].' '.$student['lastname'].'</td>';
						echo '<td>'.$student['module_name'].'</td>';
						echo '<td>'.$student['question_name'].'</td>';
						echo '<td>'.$student['marks'].'</td>';
						echo '<td>
								<a class="btn btn-sm btn-danger" href="view_report?delId=' . $student['mark_id'].'">Delete</a>
							</td>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	<?php 
		} else { 
	?>

	<div class="mt-3 mb-3 col-md-8">
		<div class="border rounded mt-2 p-3">
			<form method="POST" action="">
				<h5>View By Module</h5>
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

				<button type="submit" name="submitModule" class="btn btn-primary btn-lg mt-3 mb-3">Go</button>
			</form>
		</div>

		<h4 class="pt-2 pb-2 text-center">Or</h4>
		<div class="border rounded mt-2 p-3">
			<form method="POST" action="">	
				<h5>View By Student</h5>			
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Select Students</label>
					<div class="col-sm-8">
						<select class="form-control" name="student" required>
							<?php 
								foreach ($students as $student) {
									echo '<option value="' . $student['student_id'] . '">' . $student['firstname'].' '.$student['lastname'] .'</option>';
								}
							?>
						</select>
					</div>
				</div>

				<button type="submit" name="submitStudent" class="btn btn-primary btn-lg mt-3 mb-3">Go</button>
			</form>
		</div>
	</div>
	<?php } ?>
</section>