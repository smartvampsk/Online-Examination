<?php 
	$message = '';
	$user =  $_SESSION['user_logged'];
	if (isset($_POST['submit'])) {
		$date = new DATETIME('now', new DATETIMEZONE('Asia/Kathmandu'));

		$qsinfo = new DatabaseProcess($pdo, 'question_detail');
		$data = [
			'qd_id' => ' ',
			'tutor_id' => $user,
			'course' => $_POST['course'],
			'module' => $_POST['module'],
			'year' => $_POST['year'], 
			'level' => $_POST['level'],
			'term' => $_POST['term'],
			'date' => $date->format('Y-m-d H:i:sa'),
			'question_name' => $_POST['question_name']
		];
		$qsinfo->save($data);
		if ($qsinfo == true) {
			$last_id = $pdo->lastInsertId();
			header('location:add_question?qd_id='.$last_id.'');
			unset($data);
		}
		else
			$message = 'Oops! Sorry, failed to add module. Please try again.';
	}

	$coursesQuery = new DatabaseProcess($pdo, 'courses');
	$courses = $coursesQuery->findAll('course_id');

	$modulesQuery = new DatabaseProcess($pdo, 'modules');
	$modules = $modulesQuery->findAll('module_id');
	$templateVars = [
		'courses'=> $courses,
		'modules'=> $modules
	];
	
	$title = 'Online Examination - Questions';
	$heading = 'Add Questions';
	$content = loadTemplate('../views/add_question_home_design.php', $templateVars);
?>