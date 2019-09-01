<?php
	if(!isset($_SESSION['user_logged'])){
		header('location:login');		
	}
?>

<section class="container-fluid pt-1 p-1">
	
	<div class="row mt-1 pb-3">
		<div class="col-sm-8">
			<a class="btn btn-outline-info" href="add_tutor">Add Tutors</a>
		</div>
		
		<form class="form-inline ml-2">
			<input class="form-control" type="search" placeholder="Search">
			<button class="btn btn-outline-info ml-2">Search</button>
		</form>
	</div>
	
	<div class="overflow-auto">
		<table class="table table-sm">
			<thead class="thead-light">
				<tr>
					<th scope="col">S.N</th>
					<th scope="col">Full Name</th>
					<th scope="col">Gender</th>
					<th scope="col">DOB</th>
					<th scope="col">Email</th>
					<th scope="col">Modules</th>
					<th scope="col">Username</th>
					<th scope="col">Operation</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sn = 1;
					foreach ($tutors as $tutor) {
						if ($tutor['role'] != 'P') {
							echo '<tr>';
							echo '<td>'.$sn++.'</td>';
							echo '<td>'.$tutor['firstname'].' '.$tutor['lastname'].'</td>';
							echo '<td>'.$tutor['gender'].'</td>';
							echo '<td>'.$tutor['dob'].'</td>';
							echo '<td>'.$tutor['email'].'</td>';
							echo '<td>'.$tutor['module_name'].'</td>';
							echo '<td>'.$tutor['username'].'</td>';
							echo '<td>
									<a class="btn btn-sm btn-success" href="edit_tutor?eid=' . $tutor['tutor_id'].'">Edit</a>
									<a class="btn btn-sm btn-danger" href="view_tutor?delId=' . $tutor['tutor_id'].'">Delete</a>
								</td>';
							echo '</tr>';					
						}
					}
				?>
			</tbody>
		</table>
	</div>
</ul>
</section>