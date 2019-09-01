<?php
	if (isset($_SESSION['student_logged'])) {
		$userProfile = $pdo->query('SELECT s.*, m.*, c.*
			FROM students s
			JOIN courses c 
			ON s.course = c.course_id
			JOIN modules m
			ON c.course_id = m.course_id
			WHERE student_id = ' . $_SESSION['student_logged']
		)->fetch();
	}

	$templateVars = ['userProfile'=> $userProfile];
	
	$title = 'Online Examination - Profile';
	$heading = 'My Profile';
	$content = loadTemplate('../views/profile_design.php', $templateVars);
?>