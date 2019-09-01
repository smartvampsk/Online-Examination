<?php 
	$message = '';

	if (isset($_GET['delId'])) {
		$delTutorObj = new DatabaseProcess($pdo, 'tutors');
		$delId = $_GET['delId'];
		$delTutor = $delTutorObj->delete('tutor_id', $delId);

		if ($delTutor == true) {
			header('location:view_tutor');
			// $message = 'Module Deleted';
		}
		else
			$message = 'Oops! Sorry, Failed to Delete Module.';
	}

	$tutors = $pdo->prepare("SELECT * 
		FROM tutors t 
		JOIN modules m 
		ON t.subject = m.module_id");
	$tutors->execute();
	$templateVars = ['tutors'=> $tutors];
	
	$title = 'Online Examination - Tutor';
	$heading = 'View Tutors';
	$content = loadTemplate('../views/view_tutor_design.php', $templateVars);
?>