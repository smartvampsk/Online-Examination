<?php 
	$message = '';
	if (isset($_GET['eid'])) {
		$currentTutor = $pdo->query('SELECT * FROM tutors WHERE tutor_id = ' . $_GET['eid'])->fetch();
		$currentModule = $pdo->query('SELECT * FROM modules')->fetch();
	}

	$moduleObj = new DatabaseProcess($pdo, 'modules');
	$modules = $moduleObj->findAll();

	$templateVars = [
		'currentTutor'=>$currentTutor,
		'currentCourse'=>$currentModule,
		'modules' => $modules
	];

	if (isset($_POST['cancel'])) {
		header('location:view_tutor');
	}

	if (isset($_POST['update'])) {
		$stmt = $pdo->prepare('UPDATE tutors SET
			firstname = :firstname,
			lastname = :lastname,
			gender = :gender,
			dob = :dob,
			contact = :contact,
			email = :email,
			role = :role,
			subject = :subject,
			username = :username
			WHERE tutor_id = :tutor_id
		');
		$data = [
			'firstname' => $_POST['firstname'],
			'lastname' => $_POST['surname'],
			'gender' => $_POST['gender'],
			'dob' => $_POST['dob'],
			'contact' => $_POST['contact'],
			'email' => $_POST['email'],
			'role' => $_POST['role'],
			'subject' => $_POST['subject'],
			'username' => $_POST['username'],
			'tutor_id' => $_POST['tutor_id']
		];
		$success = $stmt->execute($data);
		if ($success = true) {
			header('location:view_tutor');
		}
		else
			$message = 'Oops! Sorry, failed to update Module. Please try again.';
	}
	
	$title = 'Online Examination - Tutor';
	$heading = 'Edit Tutors';
	$content = loadTemplate('../views/edit_tutor_design.php', $templateVars);
?>