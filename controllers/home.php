<?php
	if (isset($_SESSION['student_logged'])) {
		$user = $_SESSION['student_logged'];
		$modules = $pdo->prepare("SELECT * 
			FROM courses c 
			JOIN modules m
			ON c.course_id = m.course_id
			JOIN students s
			ON s.course = c.course_id
			WHERE s.student_id = '$user'
		");
		$modules->execute();

		$stdObj = new DatabaseProcess($pdo, 'students');
		$stdId = $_SESSION['student_logged'];
		$students = $stdObj->find('student_id', $stdId);
	}

	$templateVars = [
		'modules'=> $modules,
		'students' => $students
	];

	$title = 'Online Examination - Home';
	$content = loadTemplate('../views/home_design.php', $templateVars);
?>