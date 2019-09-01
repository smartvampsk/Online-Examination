<?php 
	$message = '';
	if (isset($_SESSION['user_logged'])) {
		$userProfile = $pdo->query('SELECT * FROM tutors WHERE tutor_id = ' . $_SESSION['user_logged'])->fetch();
	}
	
	$templateVars = ['userProfile' => $userProfile];
	
	$title = 'Online Examination - Home';
	$heading = 'Home';
	$content = loadTemplate('../views/home_design.php', $templateVars);
?>