<?php 
	$message = '';

	if (isset($_GET['qId'])) {
		$q_id = $_GET['qId'];
	}

	if (isset($_POST['update'])) {
		$qd_id = $_POST['qd_id'];
		$stmt = $pdo->prepare('UPDATE question SET
			question = :question, 
			opt1 = :opt1,
			opt2 = :opt2,
			opt3 = :opt3, 
			opt4 = :opt4,
			correct = :correct,
			mark = :mark
		WHERE q_id = :q_id
		');
		$data = [
			'q_id' => $_POST['q_id'],
			'question' => $_POST['question'],
			'opt1' => $_POST['opt1'],
			'opt2' => $_POST['opt2'],
			'opt3' => $_POST['opt3'],
			'opt4' => $_POST['opt4'],
			'correct' => $_POST['correct'],
			'mark' => $_POST['mark']
		];
		print_r($data);
		$success = $stmt->execute($data);
		if ($success == true) {
			header('location:view_question_set?vId='.$qd_id.'');
		}
		else
			$message = 'Oops! Sorry, failed to add Course. Please try again.';
	}

	$currentQuestion = $pdo->query('SELECT * FROM question 
									WHERE q_id = '.$q_id.'
									ORDER BY q_id DESC')->fetch();
	$currentQuestionName = $pdo->query('SELECT * FROM
		question_detail qd
		JOIN question q
		ON qd.qd_id = q.qd_id
		WHERE q.qd_id = qd.qd_id')->fetch();

	$templateVars = [
		'q_id'=>$q_id,
		'currentQuestion' => $currentQuestion,
		'currentQuestionName' => $currentQuestionName
	];

	$title = 'Online Examination - Questions';
	$heading = 'Edit Questions';
	$content = loadTemplate('../views/edit_question_design.php', $templateVars);
?>