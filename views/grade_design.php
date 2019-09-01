<?php
	if(!isset($_SESSION['student_logged'])){
		header('location:login');		
	}
?>

<section class="content-section pt-3" style="height: 40%;">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<h3 class="pt-3 pb-2">My Grades</h3>
			<table class="table table-sm">
				<thead class="thead-light">
					<tr>
						<th scope="col">S.N</th>
						<th scope="col">Module</th>
						<th scope="col">Question Set</th>
						<th scope="col">Marks</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sn = 1;
						foreach ($students as $student) {
							echo '<tr>';
							echo '<td>'.$sn++.'</td>';
							echo '<td>'.$student['module_name'].'</td>';
							echo '<td>'.$student['question_name'].'</td>';
							echo '<td>'.$student['marks'].'</td>';
							echo '</tr>';
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</section>