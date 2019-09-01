<?php 
	$message = '';
	if (isset($_GET['eid'])) {
		$currentModule = $pdo->query('SELECT * FROM modules WHERE module_id = ' . $_GET['eid'])->fetch();
		$currentCourse = $pdo->query('SELECT * FROM courses')->fetch();
	}
	$templateVars = [
		'currentModule'=>$currentModule,
		'currentCourse'=>$currentCourse
	];

	if (isset($_POST['cancel'])) {
		header('location:view_module');
	}

	if (isset($_POST['update'])) {
		$stmt = $pdo->prepare('UPDATE modules SET
			module_name = :module, 
			module_code = :code,
			credit = :credit,
			course_id = :course,
			level = :level
			WHERE module_id = :module_id
		');
		$data = [
			'module' => $_POST['module'],
			'code' => $_POST['code'],
			'credit' => $_POST['credit'],
			'course' => $_POST['course'],
			'level' => $_POST['level'],
			'module_id' => $_POST['module_id']
		];
		$success = $stmt->execute($data);

		if ($success == true) {
			header('location:view_module');
		}
		else
			$message = 'Oops! Sorry, failed to update Module. Please try again.';
	}

	$title = 'Online Examination - Module';
	$heading = 'Edit Module';
	$content = loadTemplate('../views/edit_module_design.php', $templateVars);
?>