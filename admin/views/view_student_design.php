<?php
	if(!isset($_SESSION['user_logged'])){
		header('location:login');		
	}
?>

<section class="pt-1 p-1">
	<div class="row mt-1 pb-3">
		<div class="col-sm-8">
			<a class="btn btn-outline-info" href="add_student">Add Student</a>
		</div>
		
		<form class="form-inline ml-2">
			<input class="form-control" type="search" placeholder="Search">
			<button class="btn btn-outline-info ml-2">Search</button>
		</form>
	</div>

	<table class="table table-sm">
		<thead class="thead-light">
			<tr>
				<th scope="col">S.N</th>
				<th scope="col">Full Name</th>
				<th scope="col">Gender</th>
				<th scope="col">DOB</th>
				<th scope="col">Email</th>
				<th scope="col">Course</th>
				<th scope="col">Level</th>
				<th scope="col">Username</th>
				<th scope="col">Operation</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$sn = 1;
				foreach ($students as $student) {
					echo '<tr>';
					echo '<td>'.$sn++.'</td>';
					echo '<td>'.$student['firstname'].' '.$student['lastname'].'</td>';
					echo '<td>'.$student['gender'].'</td>';
					echo '<td>'.$student['dob'].'</td>';
					echo '<td>'.$student['email'].'</td>';
					echo '<td>'.$student['course'].'</td>';
					echo '<td>'.$student['level'].'</td>';
					echo '<td>'.$student['username'].'</td>';
					echo '<td>
							<a class="btn btn-sm btn-success" href="edit_student?eid=' . $student['student_id'].'">Edit</a>
							<a class="btn btn-sm btn-danger" href="view_student?delId=' . $student['student_id'].'">Delete</a>
						</td>';
					echo '</tr>';
				}
			?>
		</tbody>
	</table>
</ul>
</section>