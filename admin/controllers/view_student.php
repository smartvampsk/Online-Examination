<?php 
	$message = '';

	if (isset($_GET['delId'])) {
		$delStudentObj = new DatabaseProcess($pdo, 'students');
		$delId = $_GET['delId'];
		$delStudent = $delStudentObj->delete('student_id', $delId);

		if ($delStudent == true) {
			$message = 'Student Deleted';
		}
		else
			$message = 'Oops! Sorry, Failed to Delete Student.';
	}

	$studentObj = new DatabaseProcess($pdo, 'students');
	$students = $studentObj->findAll('tutor_id');
	$templateVars = ['students'=> $students];
	
	$title = 'Online Examination - Student';
	$heading = 'View Student';
	$content = loadTemplate('../views/view_student_design.php', $templateVars);
?>