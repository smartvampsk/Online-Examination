<?php
	if(!isset($_SESSION['user_logged'])){
		header('location:login');		
	}
?>

<section class="pt-1 p-1">
	<div class="row mt-1 pb-3">
		<div class="col-sm-8">
			<a class="btn btn-outline-info" href="add_module">Add Module</a>
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
				<th scope="col">Module Title</th>
				<th scope="col">Module Code</th>
				<th scope="col">Credit</th>
				<th scope="col">Level</th>
				<th scope="col">Course</th>
				<th scope="col">Operation</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$sn = 1;
				foreach ($modules as $module) {
					echo '<tr>';
					echo '<td>'.$sn++.'</td>';
					echo '<td>'.$module['module_name'].'</td>';
					echo '<td>'.$module['module_code'].'</td>';
					echo '<td>'.$module['credit'].'</td>';
					echo '<td>'.$module['level'].'</td>';
					echo '<td>'.$module['course_id'].'</td>';
					echo '<td>
							<a class="btn btn-sm btn-success" href="edit_module?eid=' . $module['module_id'].'">Edit</a>
							<a class="btn btn-sm btn-danger" href="view_module?delId=' . $module['module_id'].'">Delete</a>
						</td>';
					echo '</tr>';
				}
			?>
		</tbody>
	</table>
</ul>
</section>