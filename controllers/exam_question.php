<?php
	if (isset($_GET['eid'])) {
		$eid =  $_GET['eid'];
		$questionObj = new DatabaseProcess($pdo, 'question');
		$questions = $questionObj->find('qd_id', $eid);

		$modules = $pdo->query("SELECT * FROM 
			modules m
			JOIN question_detail qd
			ON m.module_id = qd.module
			JOIN question q 
			ON qd.qd_id = q.qd_id
			WHERE qd.qd_id = '$eid'")->fetch();
	}

	if (isset($_POST['submit'])) {
		$date = new DATETIME('now', new DATETIMEZONE('Asia/Kathmandu'));
		$answerObj = new DatabaseProcess($pdo, 'answers');
		$student_id = $_SESSION['student_logged'];
		$marks = 0;
		for ($i=1; $i <= $_POST['counter']; $i++) 
		{
			if ($_POST['solution'.$i] == '') {
				continue;
			}
			if ($_POST['correct'.$i] == $_POST['solution'.$i]) {
				$marks += $_POST['mark'.$i];
			}

			$data = [
				'q_id' => $_POST['q_id'.$i],
				'qd_id' => $_POST['qd_id'.$i],
				'correct' => $_POST['correct'.$i],
				'solution' => $_POST['solution'.$i],
				'mark' => $_POST['mark'.$i],
				'student_id' => $student_id
			];

			$answerObj->save($data);
		}
		if ($answerObj) {
			$insertMarks = $pdo->prepare("INSERT INTO marks(student_id, qd_id, marks)
				VALUES(:student_id, :qd_id, :marks)");
			$data = [
				'student_id' => $student_id,
				'qd_id' => $_POST['qds_id'],
				'marks' => $marks
			];
			$insertMarks->execute($data);

			header('location:submitted?qd_id='.$eid.'');
		}
		else
			$message = 'Your answer is not submitted.';
	}



	$templateVars = [
		'questions' => $questions,
		'modules' => $modules
	];
	
	$title = 'Online Examination - Questions';
	$content = loadTemplate('../views/exam_question_design.php', $templateVars);
?>

