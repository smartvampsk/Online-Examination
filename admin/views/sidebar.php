<?php
	require '../../db/db.php';
	if (isset($_SESSION['user_logged'])) {
		$user = $_SESSION['user_logged'];
		$stmt = $pdo->query("SELECT * FROM tutors WHERE tutor_id = '$user'")->fetch();
	}
	else{
		error_reporting(0);
	}
?>
<div class="content-section sidebar-link p-5 ml-2 border-right border-secondary" style="width: 24.3%;">
	<h2 class="pb-3 pl-3"><a href="home">Dashboard</a></h2>
	<ul class="pl-3 list-unstyled">
		<?php 
			if ($stmt['role'] == 'P') {
			?>
				<li class="">Tutors</li>
				<li><a href="view_tutor">View Tutors</a></li>
				<li class="pb-2"><a href="add_tutor">Add Tutor</a></li>

				<li class="">Students</li>
				<li><a href="view_student">View Students</a></li>
				<li class="pb-2"><a href="add_student">Add Student</a></li>

				<li class="">Course</li>
				<li><a href="view_course">View Course</a></li>
				<li class="pb-2"><a href="add_course">Add Course </a></li>

				<li class="">Module</li>
				<li><a href="view_module">View Module</a></li>
				<li class="pb-2"><a href="add_module">Add Modules </a></li>
			<?php
			} else if ($stmt['role'] == 'N') {
				?>
					<li class="">Assessments</li>
					<li><a href="add_question_home">Create Question Set</a></li>
					<li><a href="view_question">View Question set</a></li>
					
					<li class="">Report</li>
					<li class="pb-2"><a href="view_report">View Report</a></li>
				<?php
			} 
		?>
		<li class="">Profile</li>
		<li class="pb-2"><a href="profile">My Profile</a></li><br>
		<?php 
			if ($stmt['role'] != 'P') {
				echo '<div style="height:150px"></div>';
			}
		?>
	</ul>
</div>