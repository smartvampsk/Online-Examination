<?php
	if (isset($_SESSION['student_logged'])) {
		$user = $_SESSION['student_logged'];
		$students = $pdo->prepare("SELECT *
			FROM marks mr
			JOIN question_detail qd
			ON mr.qd_id = qd.qd_id
			JOIN students s 
			ON mr.student_id = s.student_id
			JOIN modules m 
			ON m.module_id = qd.module
			JOIN courses c 
			ON m.course_id = c.course_id
			WHERE s.student_id = $user
			ORDER BY s.firstname ASC
		");
		$students->execute();
	}

	$templateVars = ['students'=> $students];
	
	$title = 'Online Examination - Profile';
	$heading = 'My Profile';
	$content = loadTemplate('../views/grade_design.php', $templateVars);
?>