<?php 
	$message = '';

	if (isset($_GET['delId'])) {
		$delNameObj = new DatabaseProcess($pdo, 'question_detail');
		$delId = $_GET['delId'];
		$delSet = $delNameObj->delete('qd_id', $delId);

		if ($delSet == true) {
			$message = 'Question Set Deleted';
		}
		else
			$message = 'Oops! Sorry, Failed to Delete Question Set.';
	}

	$questionDetailObj = new DatabaseProcess($pdo, 'question_detail');
	$questions = $questionDetailObj->findAll();

	$templateVars = [
		'questions' => $questions
	];
	
	$title = 'Online Examination - Questions';
	$heading = 'View Questions';
	$content = loadTemplate('../views/view_question_design.php', $templateVars);
?>