<?php 
	$message = '';

	if (isset($_GET['delId'])) {
		$delMarkObj = new DatabaseProcess($pdo, 'marks');
		$delId = $_GET['delId'];
		$delMark = $delMarkObj->delete('mark_id', $delId);

	}

	$courseObj = new DatabaseProcess($pdo, 'courses');
	$courses = $courseObj->findAll('course_id');

	$moduleObj = new DatabaseProcess($pdo, 'modules');
	$modules = $moduleObj->findAll('module_id');
	
	$studentObj = new DatabaseProcess($pdo, 'students');
	$students = $studentObj->findAll('student_id');

	$templateVars = [
		'courses'=> $courses,
		'modules' => $modules,
		'students' => $students
	];
	
	$title = 'Online Examination - Report';
	$heading = 'View Report';
	$content = loadTemplate('../views/view_report_design.php', $templateVars);
?>