<?php 
	$message = '';
	if (isset($_GET['eid'])) {
		$currentStudent = $pdo->query('SELECT * FROM students WHERE student_id = ' . $_GET['eid'])->fetch();
	}

	$courseObj = new DatabaseProcess($pdo, 'courses');
	$courses = $courseObj->findAll();

	$templateVars = [
		'currentStudent'=>$currentStudent,
		'courses' => $courses
	];

	if (isset($_POST['cancel'])) {
		header('location:view_student');
	}

	if (isset($_POST['update'])) {
		$stmt = $pdo->prepare('UPDATE students SET
			firstname = :firstname,
			lastname = :lastname,
			gender = :gender,
			dob = :dob,
			contact = :contact,
			email = :email,
			course = :course,
			level = :level,
			username = :username
			WHERE student_id = :student_id
		');
		$data = [
			'student_id' => $_POST['student_id'],
			'firstname' => $_POST['firstname'],
			'lastname' => $_POST['surname'],
			'gender' => $_POST['gender'],
			'dob' => $_POST['dob'],
			'contact' => $_POST['contact'],
			'email' => $_POST['email'],
			'course' => $_POST['course'],
			'level' => $_POST['level'],
			'username' => $_POST['username']
		];
		$success = $stmt->execute($data);
		// print_r($data);
		if ($success = true) {
			header('location:view_student');
		}
		else
			$message = 'Oops! Sorry, failed to update Module. Please try again.';
	}
	
	$title = 'Online Examination - Student';
	$heading = 'Edit Student';
	$content = loadTemplate('../views/edit_student_design.php', $templateVars);
?>