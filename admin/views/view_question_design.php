<?php
	if(!isset($_SESSION['user_logged'])){
		header('location:login');		
	}
?>

<section class="pt-1 p-1">
	<div class="row mt-1 pb-3">
		<div class="col-sm-8">
			<a class="btn btn-outline-info" href="add_question_home">Add Questions</a>
		</div>
		
		<form class="form-inline">
			<input class="form-control" type="search" placeholder="Search">
			<button class="btn btn-outline-info ml-2">Search</button>
		</form>
	</div>

	<table class="table table-sm">
		<thead class="thead-light">
			<tr>
				<th scope="col">S.N</th>
				<th scope="col">Question Title</th>
				<th scope="col">Module</th>
				<th scope="col">Year</th>
				<th scope="col">Level</th>
				<th scope="col">Term</th>
				<th scope="col">Created by</th>
				<th scope="col">Date Created</th>
				<th scope="col">Operation</th>
			</tr>
		</thead>
		
		<tbody>
			<?php
				$sn = 1;
				foreach ($questions as $question) {
					echo '<tr>';
					echo '<td>'.$sn++.'</td>';
					echo '<td>'.$question['question_name'].'</td>';
					echo '<td>'.$question['module'].'</td>';
					echo '<td>'.$question['year'].'</td>';
					echo '<td>'.$question['level'].'</td>';
					echo '<td>'.$question['term'].'</td>';
					echo '<td>'.$question['tutor_id'].'</td>';
					echo '<td>'.$question['date'].'</td>';
					echo '<td>
							<a class="btn btn-sm btn-info" href="view_question_set?vId=' . $question['qd_id'].'">View Set</a>
							<a class="btn btn-sm btn-danger" href="view_question?delId='.$question['qd_id'].'">Delete</a>
						</td>';
					echo '</tr>';
				}
			?>
		</tbody>
	</table>
</section>