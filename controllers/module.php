<?php
	if (isset($_POST['submitAssignment'])) {
		$stmt = $pdo->prepare("INSERT INTO assignment(submit_id, module_id, student_id, title)
			VALUES(' ', :module_id, :student_id, :title)");
		$data=[
			'module_id' => $_POST['module_id'],
			'student_id' => $_POST['student_id'],
			'title' => $_POST['title']
		];
		unset($_POST);
		$result = $stmt->execute($data);

		if ($_FILES['assignmentfile']['error'] == 0) 
		{
			$file = $pdo->lastInsertId() .'.pdf';
			move_uploaded_file($_FILES['assignmentfile']['tmp_name'], '../assignment/' . $file);
		}
	}

	$templateVars = [];

	$title = 'Online Examination - Module';
	$content = loadTemplate('../views/module_design.php', $templateVars);
?>