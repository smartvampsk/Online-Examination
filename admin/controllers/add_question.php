<?php 
	$message = '';

	if (isset($_GET['qd_id'])) {
		$qd_id = $_GET['qd_id'];
	}

	if (isset($_POST['next'])) {
		$question = new DatabaseProcess($pdo, 'question');
		$data = [
			'q_id' => ' ',
			'qd_id' => $_POST['qd_id'],
			'type' => $_POST['type'],
			'question' => $_POST['question'],
			'opt1' => $_POST['opt1'],
			'opt2' => $_POST['opt2'],
			'opt3' => $_POST['opt1'],
			'opt4' => $_POST['opt4'],
			'correct' => $_POST['correct'],
			'mark' => $_POST['mark']
		];
		$question->save($data);
		if ($question == true) {
			$qd_id = $_POST['qd_id'];
			header('location:add_question?qd_id='.$qd_id.'');
			unset($data);
		}
		else
			$message = 'Oops! Sorry, failed to add question. Please try again.';
	}

	if (isset($_POST['finish'])) {
		header('location:add_question_home');
	}

	$currentQuestion = $pdo->query('SELECT * FROM question 
									WHERE qd_id = '.$qd_id.'
									ORDER BY q_id DESC')->fetch();
	$currentQuestionName = $pdo->query('SELECT * FROM question_detail 
									WHERE qd_id = '.$qd_id.'')->fetch();
	$templateVars = [
		'qd_id'=>$qd_id,
		'currentQuestion' => $currentQuestion,
		'currentQuestionName' => $currentQuestionName
	];

	$title = 'Online Examination - Questions';
	$heading = 'Add Questions';
	$content = loadTemplate('../views/add_question_design.php', $templateVars);
?>