<?php 
	$message = '';
	if (isset($_POST['submit'])) {
		$moduleObj = new DatabaseProcess($pdo, 'modules');
		$data = [
			'module_id' => ' ',
			'module_name' => $_POST['module'],
			'module_code' => $_POST['code'],
			'credit' => $_POST['credit'], 
			'level' => $_POST['level'],
			'course_id' => $_POST['course']
		];
		$moduleObj->save($data);
		unset($data);


		if ($moduleObj) {
			$message = 'Module Added Successfully';
		}
		else
			$message = 'Oops! Sorry, failed to add module. Please try again.';
	}

	$coursesQuery = new DatabaseProcess($pdo, 'courses');
	$courses = $coursesQuery->findAll('course_id');
	$templateVars = ['courses'=> $courses];
	
	$title = 'Online Examination - Module';
	$heading = 'Add Module';
	$content = loadTemplate('../views/add_module_design.php', $templateVars);
?>