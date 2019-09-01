<?php 
	$message = '';
	if (isset($_GET['eid'])) {
		$currentCourse = $pdo->query('SELECT * FROM courses WHERE course_id = ' . $_GET['eid'])->fetch();
	}
	$templateVars = ['currentCourse'=>$currentCourse];

	if (isset($_POST['cancel'])) {
		header('location:view_course');
	}

	if (isset($_POST['update'])) {
		$stmt = $pdo->prepare('UPDATE courses SET
			title = :title, 
			credit = :credit,
			level = :level
		WHERE course_id = :course_id
		');
		$data = [
			'title' => $_POST['title'],
			'credit' => $_POST['credit'],
			'level' => $_POST['level'],
			'course_id' => $_POST['course_id']
		];
		$success = $stmt->execute($data);

		if ($success == true) {
			header('location:view_course');
			// $message = 'Course Added Successfully';
		}
		else
			$message = 'Oops! Sorry, failed to add Course. Please try again.';
	}

	$title = 'Online Examination - Course';
	$heading = 'Edit Course';
	$content = loadTemplate('../views/edit_course_design.php', $templateVars);
?>