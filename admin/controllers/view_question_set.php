<?php 
	$message = '';
	if (isset($_GET['vId'])) {
		$questionObj = new DatabaseProcess($pdo, 'question');
		$vId = $_GET['vId'];
		$questions = $questionObj->find('qd_id', $vId);	
	}

	$templateVars = [
		'questions' => $questions
	];
	
	$title = 'Online Examination - Questions';
	$heading = 'Questions';
	$content = loadTemplate('../views/view_question_set_design.php', $templateVars);
?>