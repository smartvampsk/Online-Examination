<?php
	$message = '';

	if (isset($_SESSION['user_logged'])) {
		$userProfile = $pdo->query('SELECT t.*, m.* 
			FROM tutors t
			JOIN modules m
			ON t.subject = m.module_id
			WHERE tutor_id = ' . $_SESSION['user_logged']
		)->fetch();
	}

	$templateVars = ['userProfile'=> $userProfile];
	
	$title = 'Online Examination - Profile';
	$heading = 'My Profile';
	$content = loadTemplate('../views/profile_deisgn.php', $templateVars);
?>