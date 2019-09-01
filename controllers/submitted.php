<?php 
	$user = $_SESSION['student_logged'];
	$mId = $_SESSION['mId'];
	$qd_id = $_GET['qd_id'];
	$answers = $pdo->prepare("SELECT *
		FROM answers a
		JOIN question q 
		ON a.q_id = q.q_id
		JOIN question_detail qd
		ON q.qd_id = qd.qd_id
		JOIN students s 
		ON s.student_id = a.student_id
		WHERE a.student_id = '$user' AND qd.module = '$mId' AND a.qd_id = '$qd_id'
		ORDER BY a.answer_id DESC
	");
	$answers->execute();

	$informations = $pdo->query("SELECT a.*, q.*, qd.*, s.*, m.*, c.*, mr.*, SUM(a.mark) as totalMarks 
		FROM answers a
		JOIN question q
		ON a.q_id = q.q_id
		JOIN question_detail qd
		ON q.qd_id = qd.qd_id
		JOIN students s 
		ON s.student_id = a.student_id
		JOIN modules m 
		ON m.module_id = qd.module 
		JOIN courses c
		ON c.course_id = m.course_id
		JOIN marks mr 
		ON mr.student_id = s.student_id
		WHERE a.student_id = '$user' AND qd.module = '$mId' AND a.qd_id = '$qd_id'
		ORDER BY a.answer_id DESC
	");
	$information = $informations->fetch();

	if (isset($_POST['submit'])) {
		header('location:home');
	}
	$templateVars = [
		'answers' => $answers,
		'information' => $information
	];
	$title = 'Online Examination - About';
	$content = loadTemplate('../views/submitted_design.php', $templateVars);
?>