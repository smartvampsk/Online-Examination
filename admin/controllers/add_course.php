<?php
	$message = '';
	if (isset($_POST['submit'])) {
		$courseObj = new DatabaseProcess($pdo, 'courses');
		$data = [
			'course_id' => ' ',
			'title' => $_POST['title'],
			'level' => $_POST['level'],
			'credit' => $_POST['credit']
		];
		$courseObj->save($data);
		unset($data);

		if ($courseObj == true) {
			$message = 'Course Added Successfully';
		}
		else
			$message = 'Oops! Sorry, failed to add Course. Please try again.';
	}

	$title = 'Online Examination - Course';
	$heading = 'Add Course';
	$content = loadTemplate('../views/add_course_design.php', []);
?>